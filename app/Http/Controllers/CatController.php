<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Cat;

class CatController extends Controller
{
    public function intro(Cat $cat){

        $posts=$cat->posts;
        return view('posts.index', compact('posts'));

    }

    public function pr(Cat $cat){
        $posts=$cat->posts;
        return view('posts.index', compact('posts'));

    }

    public function programming(Cat $cat){
        $posts=$cat->posts;
        return view('posts.index', compact('posts'));

    }
}
