<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	Route::get('/login', 'LoginController@index');
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');


	Route::group( ['before' => 'auth'] ,function (){

		// Route Users
		Route::get('/users', 'UsersController@index');
		Route::get('/users/create', 'UsersController@create');
		Route::post('/users/create', 'UsersController@create');
		Route::get('/users/edit/{id}', 'UsersController@edit');
		Route::post('/users/edit/{id}', 'UsersController@edit');
		Route::get('/users/delete/{id}', 'UsersController@delete');


		// Route Posts
		Route::get('/posts', 'PostsController@index');
		Route::get('/posts/create', 'PostsController@create');
		Route::post('/posts/create', 'PostsController@create');
		Route::get('/posts/edit/{id}', 'PostsController@edit');
		Route::post('/posts/edit/{id}', 'PostsController@edit');
		Route::get('/posts/delete/{id}', 'PostsController@delete');
		Route::get('/posts/activate/{id}', 'PostsController@activate');

		// Route Tags
		Route::get('/tags', 'TagsController@index');
		Route::get('/tags/json', 'TagsController@json');
		Route::get('/tags/create', 'TagsController@create');
		Route::post('/tags/create', 'TagsController@create');
		Route::get('/tags/edit/{id}', 'TagsController@edit');
		Route::post('/tags/edit/{id}', 'TagsController@edit');
		Route::get('/tags/delete/{id}', 'TagsController@delete');

		// Route Categories
		Route::get('/categories', 'CategoriesController@index');
		Route::get('/categories/create', 'CategoriesController@create');
		Route::post('/categories/create', 'CategoriesController@create');
		Route::get('/categories/edit/{id}', 'CategoriesController@edit');
		Route::post('/categories/edit/{id}', 'CategoriesController@edit');
		Route::get('/categories/delete/{id}', 'CategoriesController@delete');

		Route::get('/', 'PostsController@index');

	});

	Route::filter('auth', function()
	{
		if (Auth::guest()) return Redirect::to('admin/login');
	});

});