<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Post;
use App\User;
use File;
use App\Category;
use App\Image;
use App\TempImg;
use Storage;
use Carbon\Carbon;
class PostController extends Controller
{

    public function index(){
		$post = Post::latest();
			if ($month = request()->month) {
				$post->whereMonth('created_at', Carbon::parse($month)->month);
			}
			if ($year = request()->year) {
				$post->whereYear('created_at', $year);
			}
			if ($category = request()->category) {
				$post->where('category', $category);
			}
		$post = $post->get();

        return view('post.index', compact('post','tae'));
     }

	 public function create(){
		$category = Category::all();
		return view('post.create', compact('category'));
	}

	public function store(){
		auth()->user()->posts()->create(request(['title', 'body', 'category', 'image']));
		TempImg::truncate();

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

			$image = new TempImg;
			$image->name = $file_name;
			$image->save();

			return $file_name;
		}
	}

	public function destroy_image(){
		$file_name = request()->file_name;
		$new = $file_name;
		$delete = TempImg::where('name', $file_name)->delete();
		\File::delete(public_path('images/'. $file_name));
		return $new;
	}

	public function get_uploaded_img_name(){
		$name = TempImg::img();
		return $name;
	}
}
