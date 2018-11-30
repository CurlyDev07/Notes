<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Post extends Model
{
    protected $fillable = ['title', 'body', 'category'];

    public static function filter(){
        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get();

        return $archives;
    }



    public function user(){
        return $this->belongsTo(User::class);
    }
}
