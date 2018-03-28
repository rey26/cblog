<?php

Route::get('/', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/post/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');

Route::get('/cat/all', 'CatController@all');

Route::get('/author/{user}', 'PostsController@author');
Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/tags', 'TagsController@store');
Route::put('/tags/{tag}', 'TagsController@edit');
Route::delete('/tags/{tag}', 'TagsController@delete');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::post('/posts/{post}/comments','CommentsController@store');