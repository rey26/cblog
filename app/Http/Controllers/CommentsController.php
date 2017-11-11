<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post){

        $this->validate(\request(),[
            'body'=>'required|min:3'
        ]);

       $post->addComment(request('body', 'user_id'));
        return back();
    }
}
