<?php

Route::get('/', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/post/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');

Route::post('/posts/{post}/comments','CommentsController@store');

Route::get('/cats/{cat}', 'CatController@show');
Route::get('/cat/all', 'CatController@all');
Route::get('/cat/create', 'CatController@create');

Route::get('/author/{user}', 'PostsController@author');
Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();