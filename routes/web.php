<?php

Route::get('/', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/post/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');

Route::post('/cats', 'CatsController@store');
Route::delete('/cats/{cat}', 'CatsController@delete');
Route::get('/cat/all', 'CatsController@all');
Route::put('/cats', 'CatsController@edit');


Route::get('/author/{user}', 'PostsController@author');
Route::get('/posts/tags/{tag}', 'TagsController@index');
Route::get('/posts/cats/{cat}', 'CatsController@index');

Route::post('/tags', 'TagsController@store');
Route::put('/tags', 'TagsController@edit');
Route::delete('/tags/{tag}', 'TagsController@delete');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::post('/posts/{post}/comments','CommentsController@store');