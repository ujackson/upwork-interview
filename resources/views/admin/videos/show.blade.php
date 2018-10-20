@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('partials.sidebar')
        </div>
        <div class="col-md-9">
          <div class="card">
                <div class="card-header">
                    Video Post Details
    <div class="btn-group float-right" role="group" aria-label="Actions">
      <a class="btn btn-secondary" href="{{route('videos.edit', $video->id)}}" role="button">
                        <i class="fas fa-edit">
                        </i>
                        Edit This Post
                    </a>
                         <a class="btn btn-secondary" href="{{route('videos.index')}}" role="button">
                        <i class="fa fa-list">
                        </i>
                        All Video Posts
                    </a>
</div>

               
                </div>
                <div class="card-body">

                    <dl class="row">
  <dt class="col-sm-3">Title</dt>
  <dd class="col-sm-9">{{$video->title}}</dd>

  <dt class="col-sm-3">Slug</dt>
  <dd class="col-sm-9">{{$video->slug}}</dd>

  <dt class="col-sm-3">Body</dt>
  <dd class="col-sm-9">{!! $video->body !!}</dd>

  <dt class="col-sm-3">Video</dt>
  <dd class="col-sm-9">
    <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="{{$video->url}}" allowfullscreen></iframe>
</div>
</dd>

  <dt class="col-sm-3">Status</dt>
  <dd class="col-sm-9"><span class="badge badge-{{$video->status == 'published' ? 'success' : 'secondary'}}">{{ucfirst($video->status)}}</span></dd>

<dt class="col-sm-3">Created</dt>
  <dd class="col-sm-9">{{$video->created_at}}</dd>

  <dt class="col-sm-3">Updated</dt>
  <dd class="col-sm-9">{{$video->updated_at}}</dd>
  
</dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
