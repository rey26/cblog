<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Cat extends Model
{
    public function getRouteKeyName()
    {
        return 'keyword';
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
