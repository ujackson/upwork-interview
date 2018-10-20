@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                	@if(count($videos) > 0)
                	@foreach($videos as $video)
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-3">
                <a class="text-dark" href="{{route('video.view', $video->slug) }}">{{$video->title}}</a>
              </h3>
              <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="{{$video->url}}" allowfullscreen></iframe>
</div>
              <div class="mb-1 text-muted">{{$video->created_at->diffForHumans()}}</div>
              <p class="card-text mb-auto">{{str_limit($video->body, 100, '...')}}</p>
              <a class="btn btn-outline-secondary" href="{{route('video.view', $video->slug)}}">View Details</a>
            </div>
            
          </div>
                	@endforeach
              {{$videos->links()}}  	
                     @else
                    <div class="alert alert-light text-center" role="alert">
                        -- No records to display --
                    </div>
                	@endif
        </div>
    </div>
</div>
@endsection
