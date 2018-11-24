@extends('master.app')

@section('content')
	<div class="col-md-8">
		<div class="card card-signin flex-row my-5">
		<div class="card-img-left d-none d-md-flex">
			<!-- Background image for card set in CSS! -->
		</div>
		<div class="card-body">
			<h5 class="card-title text-center">Register</h5>
			<form class="form-signin" action="/login" method="POST">
				{{ csrf_field() }}

				<div class="form-label-group">
				<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
				<label for="inputEmail">Email address</label>
			</div><!-- Email address -->
			
			<hr>

			<div class="form-label-group">
				<input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
				<label for="password">Password</label>
			</div><!-- Password -->

			<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
			<a class="d-block text-center mt-2 small" href="/register">Register</a>

			</form><!-- FORM -->
		</div>
		</div>
	</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection