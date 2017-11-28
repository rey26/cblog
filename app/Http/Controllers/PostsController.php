<?php

namespace App\Http\Controllers;

use App\Cat;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Carbon\Carbon;
use App\Tag;



class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show', 'author']);
    }

    public function index(){
        $posts=Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }

    public function author(User $user){
        $posts=$user->posts()->orderBy('updated_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        $tags=Tag::all();
        $cats=Cat::all();
        return view('posts.create', compact(['tags', 'cats']));
    }

    public function store(Post $post){

        $this->validate(request(),[
            'title' =>'required|min:3',
            'cat_id' =>'required',
            'subtitle'=>'required|min:3',
            'body'=>'required|min:10'
            ]);

        auth()->user()->publish(new Post(request(['title', 'cat_id', 'subtitle', 'body', 'tags'])));

        session()->flash('message', 'Blog bol uspesne publikovany!');

        return redirect('/');
    }
}
