<?php

namespace Modules\Blog\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Mockery\Exception;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Category;
use Modules\Admin\Entities\User;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Tag;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Database\DatabaseManager;

use App\Http\Requests;
use Symfony\Component\Debug\Exception\FatalErrorException;

class TagsController extends Controller
{

    protected $db;

    public function __construct(Request $request, DatabaseManager $db)
    {
        $this->db = $db;
    }


    public function view($tag)
    {
        $model = Tag::where('name', $tag)->first();
        if(!empty($model)){
            if(Auth::user()){
                $posts = $model->posts()->orderBy('activated_at', 'desc')->paginate(10);
            }else{
                $posts = $model->posts()->orderBy('activated_at', 'desc')->where('active', 1)
                    ->where('activated_at', '<=', Carbon::now())
                    ->paginate(10);
            }
            $user = User::where('owner' , 1)->get()[0];
            $categories = Category::all();
            $mostRecent = Post::build()->getMostRecent();
            $mostRead = Post::build()->getRanking();
        }else{
            return view('errors.404');
        }

        return view('blog::views.posts.index', compact('posts', 'user','categories','mostRead','mostRecent'));
    }
}
