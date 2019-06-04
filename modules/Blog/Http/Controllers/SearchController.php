<?php

namespace Modules\Blog\Http\Controllers;


use App\My\Resume;
use App\Services\SearchService\PostElasticSearchService;
use Illuminate\Http\Request;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\User;
use Pingpong\Modules\Routing\Controller;

class SearchController extends Controller
{
    protected $service;


    public function __construct(PostElasticSearchService $service)
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