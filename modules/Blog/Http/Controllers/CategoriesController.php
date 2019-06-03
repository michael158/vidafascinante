<?php

namespace Modules\Blog\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\User;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Pingpong\Modules\Routing\Controller;


class CategoriesController extends Controller
{

    public function view($categorie)
    {
        $model = Category::where('name', $categorie)->first();
        if(!empty($model)){
            if(Auth::user()){
                $posts = $model->posts()->orderBy('activated_at', 'activated_at')->paginate(10);
            }else{
                $posts = $model->posts()->orderBy('activated_at', 'activated_at')->where('active', 1)
                    ->where('activated_at', '<=', Carbon::now())->paginate(10);
            }

            $user = User::where('owner' , 1)->first();
            $categories = Category::orderBy('name')->get();
            $mostRecent = Post::build()->getMostRecent();
            $mostRead = Post::build()->getRanking();
        }else{
            return view('errors.404');
        }

        return view('blog::views.posts.index', compact('posts', 'user','categories','categorie','mostRead', 'mostRecent'));
    }

}
