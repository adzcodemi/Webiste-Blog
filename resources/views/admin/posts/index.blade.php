@extends('layouts.app')

@section('content')   
    <div class="card">
        <div class="card-header">
              Published Posts
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-hover">
                <thead>
                        <tr class="d-flex">
                        <th class="col-3">Image</th>
                        <th class="col-5">Title</th>
                        <th class="col-2">Editing</th>
                        <th class="col-2">Trashing</th>
                        </tr>
                    
                </thead>
                <tbody>
                   @if($posts->count() > 0) 
                @foreach($posts as $post)
                    <tr class="d-flex">
                        <td class="col-3"><img src="{{$post->featured}}" alt="Featured Image" width="90px" height="50px"></td>
                        <td class="col-5">{{$post->title}}</td>
                        <td class="col-2"><a href="{{route('post.edit',["id"=>$post->id])}}" class="btn btn-primary btn-sm">Edit</a></td>
                        <td class="col-2"><a href="{{route('post.delete',["id"=>$post->id])}}" class="btn btn-danger btn-sm">Trash</a></td>
                    </tr>
                @endforeach
                @else    
                <tr class="d-flex">
                        <td class="col-12">No published posts.</td>
                      
                    </tr>

                @endif
                </tbody>
                    </table>
            </div>
        </div>
    </div>  
@endsection