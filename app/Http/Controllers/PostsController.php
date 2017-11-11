<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Carbon\Carbon;


class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){
        $posts=Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

//TODO: validate and store checkbox values
        $this->validate(request(),[
            'title' =>'required|min:3',
            'category' =>'required',
            'subtitle'=>'required|min:3',
            'body'=>'required|min:10'
            ]);

        auth()->user()->publish(new Post(request(['title', 'category', 'subtitle', 'body'])));

        return redirect('/');
    }
}
