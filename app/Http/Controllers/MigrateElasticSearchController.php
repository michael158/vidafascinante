<?php

namespace App\Http\Controllers;

use App\Services\PostsSearchService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Modules\Blog\Entities\Post;

class MigrateElasticSearchController extends Controller
{
    private $service;

    public function __construct(PostsSearchService $service)
    {
        $this->service = $service;
    }

    public function migrate()
    {
        $posts = Post::all();
        foreach($posts as $post){
            $this->service->create($post, $post->id);
        }
        return 'ok';
    }

}
