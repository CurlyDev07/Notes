@extends('master.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
@endsection

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        <div class="card mt-4">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <form action="/user/store/{{ $post->id }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ ($post->title) }}" aria-describedby="title">
                        </div>
                        <div class="col">
                            <label for="category">Category</label>
                            <select class="custom-select form-control" name="category">
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}"
                                         <?php echo $category->id == $post->category? 'selected' : '' ?>
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="tae"></div>
                    
                    {{-- <input type="text" id="hidden" value=""> --}}

                    <div class="form-group">
                        <label for="body"></label>
                        <textarea name="body" id="editor" class="form-control">{!! $post->body !!}</textarea>
                    </div><!-- body -->

                    <button type="submit"  id="tae" class="btn btn-primary">Submit</button>
                </form><!-- FORM -->

            </div><!-- card-body-->
        </div><!-- card-->
    </div><!-- col-md-8 -->


    <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>
@endsection

