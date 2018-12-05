<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Post;
use App\User;
use File;
use App\Category;
use App\Image;
class PostController extends Controller
{
    public function index(){
		$post = Post::latest()->get();


        return view('post.index', compact('post','tae'));
     }

	 public function create(){
		$category = Category::all();
		return view('post.create', compact('category'));
	}

	public function store(){

		auth()->user()->posts()->create(request(['title', 'body', 'category', 'image']));
		Image::truncate();

		// dd(explode(',', request()->image));

		// auth()->user()->posts()->create([
		// 	'title' => request()->title,
		// 	'body' => request()->body,
		// 	'category' => request()->category,
		// 	'image' => request()->image,
		// ]);

		return redirect('/');
	}

	public function show($id){
		
		$post = Post::find($id);

		return view('post.show', compact('post'));
	}


	public function upload(){
		$file = request()->file('file');
	
		if ($file) {
			$file_name = $file->getClientOriginalName();

			$file->move('images',$file_name);

			$image = new Image;
			$image->name = $file_name;
			$image->save();

			return $file_name;
		}
	}

	public function destroy_image(){

		$file_name = request()->file_name;

		\File::delete(public_path('images/'. $file_name));

		return 'tae';
	}

	public function get_uploaded_img_name(){
		$name = Image::img();

		return $name;
	}
}
