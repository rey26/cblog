<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function publish(Post $post){
        $this->posts()->save($post);
        $tags=request(['tags']);
        if($tags) {
            foreach ($tags as $tag) {
                $post->tags()->attach($tag);
            }
        }
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function isAdmin(){
        return $this->admin;
    }
}
