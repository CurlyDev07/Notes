<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
class Image extends Model
{
    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }
   
  
}
