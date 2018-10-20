@extends('layouts.app')

@section('content')
<div class="container">

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Welcome to {{config('app.name')}} blog.</h1>
          <p class="lead my-3">Here you will learn how to build a text post and video post site.</p>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">Featured Text Post</strong>
              <h3 class="mb-3">
                <a class="text-dark" href="{{$post ? route('post.view', $post->slug) : route('posts')}}">{{$post->title ?? 'Featured text post title'}}</a>
              </h3>
              <a href="{{$post ? route('post.view', $post->slug) : route('posts')}}"><img class="card-img-top flex-auto" src="{{$post->photo ?? 'https://via.placeholder.com/800x400?text=Hello Word'}}" alt=""></a>
              <div class="mb-1 text-muted">{{$post ? $post->created_at->diffForHumans() : now()->diffForHumans()}}</div>
              <p class="card-text mb-auto">{{$post ? str_limit($post->body, 100, '...') : 'Featured text post body text goes here'}}</p>
              <a href="{{$post ? route('post.view', $post->slug) : route('posts')}}">Continue reading</a>
            </div>
            
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success">Featured Video Post</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="{{$video ? route('video.view', $video->slug) : route('videos')}}">{{$video->title ?? 'Featured video post title'}}</a>
              </h3>
              <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="{{$video->url ?? 'https://www.youtube.com/embed/XW0NCT027bQ'}}" allowfullscreen></iframe>
</div>
              <div class="mb-1 text-muted">{{$video ? $video->created_at->diffForHumans() : now()->diffForHumans()}}</div>
              <p class="card-text mb-auto">{{$video ? str_limit($video->body, 100, '...') : 'Featured video post body text goes here'}}</p>
              <a href="{{$video ? route('video.view', $video->slug) : route('videos')}}">Continue reading</a>
            </div>
            
          </div>
        </div>
      </div>
    </div>

   
@endsection
