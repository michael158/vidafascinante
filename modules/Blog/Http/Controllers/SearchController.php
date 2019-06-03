<?php namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostsSearchService;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\User;
use Pingpong\Modules\Routing\Controller;

class SearchController extends Controller {
	

    private $service;

    public function __construct(PostsSearchService $service)
    {
        $this->service = $service;
    }

    public function search(Request $request)
    {
        $data = $this->service->search($request->get('q'));
        $user =  User::where('owner' , 1)->first();
        $categories = Category::orderBy('name')->get();

        $mostRecent = Post::build()->getMostRecent();
        $mostRead = Post::build()->getRanking();

        $posts = collect($data['hits']['hits']);

        return view('blog::views.search.index',compact('user','categories','posts','mostRecent', 'mostRead'));
    }


	
}
