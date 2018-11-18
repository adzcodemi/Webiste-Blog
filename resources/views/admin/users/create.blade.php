@extends('layouts.app')


@section('content')

@include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
                Create a new users
        </div>
    <form action="{{ route('user.store') }}" class="form" method="post" enctype="multipart/form-data">  
            {{ csrf_field() }}    
        <div class="card-body">
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" name="name" class="form-control">
             </div>

             <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

        </div>
        <div class="card-footer">

            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>

    </div>

    
@endsection