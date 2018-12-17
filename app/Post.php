<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Category;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'category', 'image'];

    public static function filter(){
        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get();

        return $archives;
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
    
    public function category(){
        return $this->hasMany(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
