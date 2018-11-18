@extends('layouts.app')


@section('content')


    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
                Create a New Category
        </div>
    <form action="{{ route('category.store') }}" class="form" method="post" >  
            {{ csrf_field() }}    
        <div class="card-body">
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" name="name" class="form-control">
             </div>
        </div>
        <div class="card-footer">

            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>

    </div>

    
@endsection