<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 23/04/2017
 * Time: 17:00
 */

namespace App\Http\Controllers;


use App\Services\FixService;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Post;

class FixController extends Controller
{
    private $service;

    public function __construct(Request $request, FixService $service)
    {
        $params = $request->all();

        if(!isset($params['password']))
            abort(412, 'Missing param "password" please provider password to complete the request ');

        if($params['password'] != 'gmtop123')
            abort(412, 'The password is invalid');

        $this->service = $service;
    }


    public function fixResume()
    {
        return $this->service->fixResume();
    }


    public function fixImages()
    {
        $posts = Post::all();

        foreach ($posts as $post){
            $this->service->fixContentImages($post);
        }

        return ['message' => 'The images has fixed with success'];
    }

    public function fixHttps(){
        $posts = Post::all();

        foreach ($posts as $post){
            $this->service->fixHttps($post);
        }

        return ['message' => 'The urls has fixed with success'];
    }


}