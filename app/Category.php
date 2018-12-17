<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Post;
class Category extends Model
{

    public static function filter_cat(){
        $filter_cat = Category::all();
        return $filter_cat;
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
