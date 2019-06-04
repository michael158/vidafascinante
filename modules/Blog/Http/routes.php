<?php

Route::group(['prefix' => '', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
    Route::get('/', 'PostsController@index');
    Route::get('/{slug}', 'PostsController@view');

    Route::get('/tag/{tag}', 'TagsController@view');
    Route::get('/category/{category}', 'CategoriesController@view');

    Route::get('/contato/blog','ContatoController@index');
    Route::post('/contato/blog','ContatoController@index');


});