<?php

namespace App;
use App\User;
class Post extends Model
{
    protected $fillable=['user_id', 'title', 'subtitle', 'category', 'body'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function addComment($body){
        $this->comments()->create(compact('body'));
    }
}
