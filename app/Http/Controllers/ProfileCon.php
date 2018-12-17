<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class ProfileCon extends Controller
{
    public function post(){
        $post = auth()->user()->posts()->get();
        return view('user.post.index', compact('post'));
    }

    public function delete($id){
        $post = Post::find($id)->delete();
        return back();
    }

    public function update($id){
        $post =  Post::find($id);
        $category = Category::all();
        return view('user.post.update', compact('post', 'category'));
    }

    public function store($id){
        $post = Post::find($id);
        $post->title = request()->title;
        $post->body = request()->body;
        $post->category = request()->category;
        $post->update();
        return redirect('/user/post');
    }
}
