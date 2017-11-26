<?php

namespace App\Providers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view){
           $stats=\App\Post::archives();
           $tags=\App\Tag::has('posts')->pluck('name');
           $view->with(compact(['stats', 'tags']));
        });
        view()->composer('layouts.header', function($view){
            $view->with('user', $user=Auth::user());
            $view->with('cats', $cats=\App\Cat::all());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
