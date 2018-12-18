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
                <form action="/post/store" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" aria-describedby="title">
                        </div>
                        <div class="col">
                            <label for="category">Category</label>
                            <select class="custom-select form-control" name="category">
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="tae"></div>
                    {{-- <input type="text" id="hidden" value=""> --}}

                    <div class="form-group">
                        <label for="body"></label>
                        <textarea name="body" id="editor" class="form-control"></textarea>
                    </div><!-- body -->

                    <button type="submit"  id="tae" class="btn btn-primary">Submit</button>
                </form><!-- FORM -->

                <form action="/upload" method="POST" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">
                    {{ csrf_field() }}
                </form>

            </div><!-- card-body-->
        </div><!-- card-->
    </div><!-- col-md-8 -->
@endsection

@section('script')

    <script>

        Dropzone.options.myAwesomeDropzone = {// "myAwesomeDropzone" is the camelized version of the HTML element's ID
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            // maxFiles: 1,
            addRemoveLinks: true,
            dictRemoveFileConfirmation: 'Are you sure to remove this file?',
            
            renameFile: function (file) {
                name = new Date().getTime() + Math.floor((Math.random() * 100) + 1) + '_' + file.name;
                return name;
            },

            success: function(file){
                this.on("removedfile", function (file) {
                    // alert(file.upload.filename); // get the renamed uploaded file
                    $.ajax({
                        method: "GET",
                        url: '{{ URL::to('/destroy_image') }}',
                        data: {file_name: file.upload.filename},
                        success: function(file){
                            alert(file);
                        }
                    });
                });

                $.ajax({
                    method: "GET",
                    url: '{{ URL::to('/get_img_names') }}',
                    success: function(file){
                       var tae = $('#tae').html('<input type="text" name="image" value="'+file+'">');
                        console.log(tae);
                    } 
                })
            },
        };
  </script>

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
