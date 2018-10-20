@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('status') }}
                </div>
                @endif
           
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body align-items-start">
              <h3 class="mb-3">
                {{$video->title}}
              </h3>
             <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="{{$video->url}}" allowfullscreen></iframe>
</div>
              <div class="mb-1 text-muted">{{$video->created_at->diffForHumans()}}</div>
              <p class="card-text mb-auto">{!! $video->body !!}</p>

<div class="card border-0">
  <div class="card-body">
    <h5 class="card-title">Comments ({{$video->comments->count()}})</h5>
    <hr class="my-4">
    @if(count($video->comments) > 0)
    <ul class="list-unstyled"> 
    @foreach ($video->comments as $comment)       
  <li class="media mb-3">
    <img class="mr-3 rounded-circle" src="{{$comment->user->avatar}}" alt="">
    <div class="media-body">
      <h5 class="mt-0 mb-1">{{$comment->user->name}} <small class="date float-right">{{$comment->created_at->diffForHumans()}}</small></h5>
      {!! $comment->body !!}
    </div>
  </li>
  @endforeach
 @else
                    <div class="alert alert-light text-center" role="alert">
                        -- No comments to display --
                    </div>
                    @endif
</ul>

<div class="jumbotron">
  <h1>Leave A Comment</h1>

  @auth
      <form action="{{ route('comment.video', $video->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="comment">
                                {{ __('Comment') }}
                            </label>
                            <div class="col-md-8">
<textarea class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" id="comment" name="comment" rows="5" required>{!! old('comment') !!}</textarea>
                                @if ($errors->has('comment'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('comment') }}
                                    </strong>
                                </span>
                                @endif
                            </div>
                        </div>
<hr class="my-4">
<button type="submit" class="btn btn-primary btn-lg" role="button">Submit</button>
                    </form>
@endauth

@guest
 <a class="btn btn-primary btn-lg mt-2" href="{{route('login')}}" role="button">Login to Comment</a>
@endguest

</div>

  </div>
</div>
              
            </div>
            
          </div>

         
                   
        </div>
    </div>
</div>
@endsection
