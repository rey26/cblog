<?php

namespace App;
use App\User;
use App\Cat;
use Carbon\Carbon;
use App\Tag;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

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

        return static::selectRaw('year(updated_at) year, monthname(updated_at) month, count(*) published')
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
        return 'slug';
    }
}
