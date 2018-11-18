@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
               Tags
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-hover">
                <thead>
                        <tr class="d-flex">
                        <th class="col-8">Name</th>
                        <th class="col-2">Editing</th>
                        <th class="col-2">Deleting</th>
                        </tr>
                    
                </thead>
                <tbody>
                @if($tags->count() > 0) 
                    @foreach($tags as $tag)
                    <tr class="d-flex">
                        <td class="col-8">{{$tag->tag}}</td>
                        <td class="col-2"><a href="{{route('tag.edit',["id"=>$tag->id])}}" class="btn btn-primary btn-sm">Edit</a></td>
                        <td class="col-2"><a href="{{route('tag.delete',["id"=>$tag->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    @endforeach
                @else    
                <tr class="d-flex">
                        <td class="col-12">No tags yet.</td>
                    </tr>

                @endif
                </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection