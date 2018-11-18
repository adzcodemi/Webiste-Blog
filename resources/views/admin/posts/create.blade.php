@extends('layouts.app')

@section('styles')
 <link rel="stylesheet" href="{{asset('css/wysihtml5.min.css')}}">
@endsection

@section('content')

@include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
                Create a New Post
        </div>
    <form action="{{ route('post.store') }}" class="form" method="post" enctype="multipart/form-data">  
            {{ csrf_field() }}    
        <div class="card-body">
             <div class="form-group">
                 <label for="title">Title</label>
                 <input type="text" name="title" class="form-control">
             </div>

             <div class="form-group">
                    <label for="content">Content</label>
                    <textarea type="text" name="content" rows="5" cols="5" class="textarea form-control">
                    </textarea>   
                </div>

                <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                        </select>
                </div>    

                <div class="form-group">
                        <label for="tag">Select Tags</label>
                        @foreach ($tags as $tag)
                        <div class="form-check">
                             <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}" >
                             <label class="form-check-label" >
                                    {{$tag->tag}}
                            </label>
                        </div>       
                       @endforeach
                </div> 

                     
                
                <div class="form-group">
                        <label for="featured">Featured Image</label>
                        <input type="file" name="featured" class="form-control-file">
                </div>

               

        </div>
        <div class="card-footer">

            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>

    </div>

    
@endsection


@section('scripts')
<!-- CK Editor -->
<script src="{{asset('js/ckeditor.min.js') }}" ></script>  
<script>
$(function(){
       // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('.textarea'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })
})
</script>
@endsection

