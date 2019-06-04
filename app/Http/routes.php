<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/admin', function(){
    return Redirect::to('admin');
});

Route::post('/fix-resumes', 'FixController@fixResume');
Route::post('/fix-images', 'FixController@fixImages');
Route::post('/fix-https', 'FixController@fixHttps');



Route::get('/search', '\Modules\Blog\Http\Controllers\SearchController@search');


Route::get('/more-like-this', function (){
    $instance = app()->make(\App\Services\SearchService\PostElasticSearchService::class);

    return $instance->moreLikeThis(117);
});
