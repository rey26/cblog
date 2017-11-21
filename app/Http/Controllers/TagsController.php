<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag){
        $posts=$tag->posts()->orderBy('updated_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }
}
