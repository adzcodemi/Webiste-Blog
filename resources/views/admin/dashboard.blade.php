@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-deck   text-white text-center ">
                        <div class="card bg-primary" >
                            <h5 class="card-header">Published Post</h5>
                            <div class="card-body">
                                <h5 class="card-title">{{$post_count}}</h5>
                             </div>
                        </div>    
                    
                        <div class="card  bg-success" >
                            <h5 class="card-header">Categories</h5>
                            <div class="card-body">
                                <h5 class="card-title">{{$category_count}}</h5>
                            </div>
                        </div> 
                        <div class="card  bg-danger" >
                            <h5 class="card-header">Trashed Post</h5>
                            <div class="card-body">
                                 <h5 class="card-title">{{$trashed_count}}</h5>
                            </div>
                        </div>   
                    </div>          
                </div>
            </div>
@endsection




