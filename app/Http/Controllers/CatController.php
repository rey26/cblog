<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Cat;

class CatController extends Controller
{
    public function show(Cat $cat){

        $posts=$cat->posts()->orderBy('updated_at', 'desc')->get();

        return view('posts.index', compact('posts'));

    }

    public function all(){
        $cats=Cat::all();
        return view('cats.all', compact('cats'));
    }

}
