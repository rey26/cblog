<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    //stores Tag from AJAX call @views/layouts/create.blade.php
    public function store(Request $request){
        $tag=Tag::create($request->all());
        return response($tag);
    }

    //delete Tag from AJAX call @views/layouts/create.blade.php
    public function delete($tag){
        $output=Tag::destroy($tag);

        return response($output);
    }

    public function edit(Request $request){
        $tagId=$request->get("pk");
        $name=$request->get("name"); //fillable name(check model fillables)
        $value=$request->get("value");
        $tag=Tag::findOrFail($tagId);
        $tag->$name=$value;
        $tag->save();
        return response($tag);
    }


    public function index(Tag $tag){
        $posts=$tag->posts()->orderBy('updated_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }
}
