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
                    Text Post Details
    <div class="btn-group float-right" role="group" aria-label="Actions">
      <a class="btn btn-secondary" href="{{route('posts.edit', $post->id)}}" role="button">
                        <i class="fas fa-edit">
                        </i>
                        Edit This Post
                    </a>
                         <a class="btn btn-secondary" href="{{route('posts.index')}}" role="button">
                        <i class="fa fa-list">
                        </i>
                        All Text Posts
                    </a>
</div>

               
                </div>
                <div class="card-body">

                    <dl class="row">
  <dt class="col-sm-3">Title</dt>
  <dd class="col-sm-9">{{$post->title}}</dd>

  <dt class="col-sm-3">Slug</dt>
  <dd class="col-sm-9">{{$post->slug}}</dd>

  <dt class="col-sm-3">Body</dt>
  <dd class="col-sm-9">{!! $post->body !!}</dd>

  <dt class="col-sm-3">Photo</dt>
  <dd class="col-sm-9"><img src="{{$post->photo}}" class="img-fluid" alt="">
</dd>

  <dt class="col-sm-3">Status</dt>
  <dd class="col-sm-9"><span class="badge badge-{{$post->status == 'published' ? 'success' : 'secondary'}}">{{ucfirst($post->status)}}</span></dd>

<dt class="col-sm-3">Created</dt>
  <dd class="col-sm-9">{{$post->created_at}}</dd>

  <dt class="col-sm-3">Updated</dt>
  <dd class="col-sm-9">{{$post->updated_at}}</dd>
  
</dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
