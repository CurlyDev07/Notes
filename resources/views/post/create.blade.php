@extends('master.app')

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <div class="card mt-4">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <form action="/post/store" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" placeholder="Title" aria-describedby="title">
                    </div><!-- Title -->
                    
                    <div class="form-group">
                        <label for="body"></label>
                        <textarea name="body" class="form-control"></textarea>
                    </div><!-- body -->

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form><!-- FORM -->
            </div><!-- card-body-->
        </div><!-- card-->
    </div><!-- col-md-8 -->

@endsection