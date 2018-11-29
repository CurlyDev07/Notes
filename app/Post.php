<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Post extends Model
{
    protected $fillable = ['title', 'body', 'category'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
