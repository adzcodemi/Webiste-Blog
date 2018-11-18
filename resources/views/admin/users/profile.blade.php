@extends('layouts.app')


@section('content')

@include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
                Edit your profile: {{$user->name}}
        </div>
    <form action="{{ route('user.profile-update') }}" class="form" method="post" enctype="multipart/form-data">  
            {{ csrf_field() }}    
        <div class="card-body">
             <div class="form-group">
                 <label for="name">Name</label>
             <input type="text" name="name" class="form-control" value="{{$user->name}}">
             </div>

             <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control"  value="{{$user->email}}">
             </div>

            <div class="form-group">
            <label for="password">New password</label>
            <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                    <label for="avatar">Upload new Avatar</label>
                    <input type="file" name="avatar" class="form-control-file">
            </div>

            <div class="form-group">
            <label for="facebook">Facebook profile</label>
            <input type="text" name="facebook" class="form-control"  value="{{$user->profile->facebook}}">
            </div>


            <div class="form-group">
            <label for="youtube">Youtube profile</label>
            <input type="text" name="youtube" class="form-control"  value="{{$user->profile->youtube}}">
            </div>

            <div class="form-group">
                <label for="about">About you</label>
                <textarea type="text" name="about" rows="5" cols="5" class="form-control">{{$user->profile->about}}
                </textarea>   
            </div>
        </div>
        <div class="card-footer">

            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>

    </div>

    
@endsection