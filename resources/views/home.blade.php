@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    My comments ({{$comments->count()}})
                </div>
                <div class="card-body">
                    @if(count($comments) > 0)
                    <ul class="list-group">
                        @foreach ($comments as $comment)

                      
            
                        <li class="list-group-item d-flex justify-content-between align-items-center">                 
                            {{$comment->body}}
                            @if($comment->commentable_type == 'App\Post') 
                            <span class="badge badge-primary m-3">
                                Text Post
                            </span>
                            <a href="{{route('post.view', $comment->commentable->slug)}}" class="btn btn-secondary">
                            View Post
                            </a>
                            @endif

                            @if($comment->commentable_type == 'App\Video') 
                            <span class="badge badge-success m-3">
                                Video Post
                            </span>
                            <a href="{{route('video.view', $comment->commentable->slug)}}" class="btn btn-secondary">
                            View Post
                            </a>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <div class="alert alert-light text-center" role="alert">
                        -- No comments to display --
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
