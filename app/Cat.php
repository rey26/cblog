<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Cat extends Model
{
    protected $fillable=['id', 'title', 'slug', 'parentId'];

    public $timestamps = false;

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function parent(){
        return $this->belongsTo('App\Cat', 'parentId');
    }

    public function children(){
        return $this->hasMany('App\Cat', 'parentId');
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
