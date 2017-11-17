<?php

namespace App;
use App\User;
use App\Cat;
use Carbon\Carbon;
use App\Tag;

class Post extends Model
{
    protected $fillable=['user_id', 'title', 'subtitle', 'cat_id', 'body'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cat(){
        return $this->belongsTo(Cat::class);
    }

    public function addComment($data){
        $this->comments()->create(compact('data'));
    }

    public function scopeFilter($query, $filters){

        if (empty($filters))
            return ;
        if($month=$filters['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year=$filters['year']){
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function tags(){
       return $this->belongsToMany(Tag::class);
    }

    public function getRouteKeyName()
    {
        return 'title';
    }
}
