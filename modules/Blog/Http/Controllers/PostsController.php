<?php

namespace Modules\Blog\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Mockery\Exception;
use Modules\Admin\Entities\User;
use Modules\Blog\Entities\Category;
use Modules\Blog\Services\RecommendedService;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Database\DatabaseManager;

use App\Http\Requests;
use Modules\Blog\Entities\Post;

class PostsController extends Controller
{

    protected $db;
    private $recommendedService;

    public function __construct(Request $request, DatabaseManager $db, RecommendedService $recommendedService)
    {
        $this->db = $db;
        $this->recommendedService = $recommendedService;
    }


    public function index()
    {
        if(Auth::user()){
            $posts = Post::orderBy('activated_at', 'desc')->paginate(10);
        }else{
            $posts = Post::orderBy('activated_at', 'desc')->where('active', 1)
                ->where('activated_at', '<=', Carbon::now())->paginate(10);
        }

        $user = User::where('owner' , 1)->get()[0];
        $mostRecent = Post::build()->getMostRecent();
        $mostRead = Post::build()->getRanking();
        $categories = Category::orderBy('name')->get();

        return view('blog::views.posts.index', compact('posts', 'user','categories','mostRecent','mostRead'));
    }

    public function view($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        if(!Auth::user()){
            if(!$post->active || $post->activated_at > Carbon::now()){
                return redirect('/');
            }
        }

        $user = User::where('owner' , 1)->get()[0];
        $categories = Category::all();
        $mostRecent = Post::build()->getMostRecent();
        $mostRead = Post::build()->getRanking();

        $data['user'] = $user;
        $data['posts'] = $post;

        $recommended = $this->recommendedService->getRecommendedPosts($post->tags, $post->id);

        if($post->active && $post->activated_at < Carbon::now()){
            $this->db->beginTransaction();
            try {
                $post->update(['views' => $post->views + 1]);

                $post->save();
            } catch (Exception $e) {
                $this->db->roolback();
            }

            $this->db->commit();
        }

        return view('blog::views.posts.view', compact('post', 'user','categories', 'recommended', 'mostRecent','mostRead'));
    }

}
