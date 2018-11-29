<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Category extends Model
{
    public static function categories(){
        $category = Category::all();
        return $category;
    }
}
