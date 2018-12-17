  <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
	<a class="navbar-brand" href="#">Start Bootstrap</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/post/create">Post</a>
			</li>
			

			@if (auth()->check())
				<div class="dropdown show">
					<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						{{ auth()->user()->name }}
					</a>
					
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="/user/post">My Post</a>
						<a class="dropdown-item" href="/logout">Logout</a>
					</div>
				</div>
			@else
				<li class="nav-item">
					<a class="nav-link" href="/register">Sign Up</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/login">Login</a>
				</li>
			@endif
			
		</ul>
	</div>
	</div>
</nav>