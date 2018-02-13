<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Cat extends Model
{
    public $timestamps = false;

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function parent(){
        return $this->belongsTo('App\Cat', 'parent_id');
    }

    public function children(){
        return $this->hasMany('App\Cat', 'parent_id');
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
