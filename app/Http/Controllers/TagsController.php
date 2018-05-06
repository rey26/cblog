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

    public function edit(Request $request, $tag_id){
        $tag=Tag::find($tag_id);
        $tag->name=$request->name;
        $tag->save();
        return response($tag);
    }


    public function index(Tag $tag){
        $posts=$tag->posts()->orderBy('updated_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }
}
