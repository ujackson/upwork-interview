@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                	@if(count($posts) > 0)
                	@foreach($posts as $post)
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-3">
                <a class="text-dark" href="{{route('post.view', $post->slug) }}">{{$post->title}}</a>
              </h3>
              <a href="{{route('post.view', $post->slug)}}"><img class="card-img-top flex-auto" src="{{$post->photo}}" alt=""></a>
              <div class="mb-1 text-muted">{{$post->created_at->diffForHumans()}}</div>
              <p class="card-text mb-auto">{{str_limit($post->body, 100, '...')}}</p>
              <a class="btn btn-outline-secondary" href="{{route('post.view', $post->slug)}}">Continue reading</a>
            </div>
            
          </div>
                	@endforeach
              {{$posts->links()}}  	
                     @else
                    <div class="alert alert-light text-center" role="alert">
                        -- No records to display --
                    </div>
                	@endif
        </div>
    </div>
</div>
@endsection
