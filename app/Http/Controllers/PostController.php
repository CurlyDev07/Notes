<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){

        return view('post.index');
     }

     public function create(){
        return view('post.create');
     }

     public function store(){
        Post::create(request(['title', 'body']));
        
        return view('/');
     }
}