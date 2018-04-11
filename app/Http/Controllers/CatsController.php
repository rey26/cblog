<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Cat;

class CatsController extends Controller
{
    public function index(Cat $cat){

        $posts=$cat->posts()->orderBy('updated_at', 'desc')->get();

        return view('posts.index', compact('posts'));

    }

    public function store(Request $request){
        $cat=Cat::create($request->all());
        return response($cat);
    }

    public function delete($cat){
        $output=Cat::destroy($cat);
        return $output;
    }

    public function edit(Request $request){
        $catId=$request->get('pk');
        $cat=Cat::findOrFail($catId);
        $name=$request->get('name');
        $value=$request->get('value');
        $cat->$name=$value;
        $cat->slug=strtolower($value);
        $cat->save();
        return response($cat);
    }

    public function all(){
        $cats=Cat::all();
        return view('cats.all', compact('cats'));
    }

}
