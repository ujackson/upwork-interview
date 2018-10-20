@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('partials.sidebar')
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{$posts_count}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Total Text Posts</h6>
                        </div>
                    </div>
                </div>
               <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{$videos_count}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Total Video Posts</h6>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{$comments_count}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Total Comments</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{$users_count}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Total Users</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
