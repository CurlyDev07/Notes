@include('master.head')

@include('master.navigation')

<!-- Page Content -->
<div class="container">
    <div class="row">   

        @yield('content')
        @include('master.sidebar')
    </div>  <!-- /.row -->
</div>  <!-- /.container -->


@include('master.footer')


