<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Post;
use App\User;
use File;
use App\Category;

class PostController extends Controller
{
    public function index(){
		$post = Post::latest()->get();

		$tae = Category::selectRaw('year(created_at) year, monthname(created_at) month, count(*) count')->groupBy('year','month')->get()->toArray();

        return view('post.index', compact('post','tae'));
     }

	public function create(){
		$category = Category::all();
		return view('post.create', compact('category'));
	}

	public function store(){
		auth()->user()->posts()->create(request(['title', 'body', 'category']));
		
		return redirect('/');
	}

	public function show($id){
		$post = Post::find($id);

		return view('post.show', compact('post'));
	}

	public function upload(){
		$file = request()->file('file');

		if ($file) {
			$file_name = date("m-d-y-H-i-s").'.'.$file->getClientOriginalExtension();
			$file->move('images', $file_name); // the file move to public/images/filename
		}
		
		return redirect('/destroy_image');
	}

	public function destroy_image(){

		// // delete('image/'.request()->file_name);
		// $delete_file = File::delete(public_path().'/images/'.$file_name);

		// if ($delete_file) {
		// 	return 'deleted';
		// }
	}
}
