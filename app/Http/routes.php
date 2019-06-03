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

Route::get('/migrate-elasticsearch', 'MigrateElasticSearchController@migrate');

Route::post('/fix-resumes', 'FixController@fixResume');
Route::post('/fix-images', 'FixController@fixImages');
Route::post('/fix-https', 'FixController@fixHttps');



Route::get('/search', 'MigrateElasticSearchController@migrate');

