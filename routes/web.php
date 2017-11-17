<?php

Route::get('/', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/post/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');

Route::post('/posts/{post}/comments','CommentsController@store');

Route::get('/Cat/{cat}', 'CatController@show');

Route::get('/home', 'HomeController@index')->name('home');

get('protected', ['middleware' => ['auth', 'admin'], function() {
    return view('home');
}]);

Auth::routes();