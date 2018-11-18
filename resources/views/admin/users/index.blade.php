@extends('layouts.app')

@section('content')   
    <div class="card">
        <div class="card-header">
              Users
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-hover">
                <thead>
                        <tr class="d-flex">
                        <th class="col-3">Image</th>
                        <th class="col-4">Name</th>
                        <th class="col-3">Permissions</th>
                        <th class="col-2">Delete</th>
                        </tr>
                </thead>
                <tbody>
                   @if($users->count() > 0) 
                @foreach($users as $user)
                    <tr class="d-flex">
                        <td class="col-3"><img src="{{asset($user->profile->avatar)}}" alt="Featured Image" width="60px" height="60px" style="border-radius:50%"></td>
                        <td class="col-4">{{$user->name}}</td>
                        <td class="col-3"> 
                           @if($user->admin)
                           <a href="{{route('user.not-admin',['id'=>$user->id])}}" class="btn btn-danger btn-sm">Remove permissions</a>
                           @else
                             <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-success btn-sm">Make admin</a>
                           @endif</td>
                        <td class="col-2">
                            @if(Auth::id() !== $user->id)
                            <a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-danger btn-sm">Delete</a>
                            @endif
                        </td>
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