@extends('master.app')

@section('content')
	<!-- Blog Entries Column -->
	<div class="col-md-8">

		<h1 class="my-4">My Post
			<small>Secondary Text</small>
        </h1>
        
		@foreach ($post as $post)
			<div class="card mb-4">
				{{-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> --}}
				<div class="card-body">
					<h2 class="card-title">{{ $post->title }}</h2>
					<p class="card-text">{!! $post->body !!}</p>
                    <a href="/post/show/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a>
                    <a href="/user/update/{{ $post->id }}" class="btn btn-success">Update</a>
                    <a href="/user/delete/{{ $post->id }}" class="btn btn-danger">Delete</a>
				</div>
				<div class="card-footer text-muted">
					Posted on {{ $post->created_at->toFormattedDateString() }} by 
					<a href="">{{ $post->user->name }}</a>
				</div>
			</div><!-- Blog Post -->
		@endforeach

		<ul class="pagination justify-content-center mb-4">
			<li class="page-item">
				<a class="page-link" href="#">&larr; Older</a>
			</li>
			<li class="page-item disabled">
				<a class="page-link" href="#">Newer &rarr;</a>
			</li>
		</ul><!-- Pagination -->
	</div>

@endsection