@extends('layouts.app')


@section('content')

@include('admin.includes.errors')
   
    <div class="card">
        <div class="card-header">
               Update category: {{$category->name}}
        </div>
    <form action="{{ route('category.update',['id'=>$category->id]) }}" class="form" method="post" >  
            {{ csrf_field() }}    
        <div class="card-body">
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" name="name"  value="{{$category->name}}"class="form-control">
             </div>
        </div>
        <div class="card-footer">

            <button type="submit" class="btn btn-success">Update</button>
        </div>
        </form>

    </div>

    
@endsection