@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('partials.sidebar')
        </div>
        <div class="col-md-8">
             @if (session('error'))
                <div class="alert alert-danger mb-3" role="alert">
                    {{ session('error') }}
                </div>
                @endif

            <div class="card">
                <div class="card-header">
                    Edit Video Post 
                    <a class="btn btn-secondary float-right" href="{{route('videos.index')}}" role="button">
                        <i class="fa fa-list">
                        </i>
                        All Video Posts
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('videos.update', $video->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="title">
                                {{ __('Title') }}
                            </label>
                            <div class="col-md-8">
                                <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" type="text" value="{{ old('title', $video->title) }}">
                                    @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $errors->first('title') }}
                                        </strong>
                                    </span>
                                    @endif
                                </input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="body">
                                {{ __('Body') }}
                            </label>
                            <div class="col-md-8">
<textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" id="body" name="body" rows="3">{!! old('body', $video->body) !!}</textarea>
                                @if ($errors->has('body'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('body') }}
                                    </strong>
                                </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="url">
                                {{ __('Youtube Video URL') }}
                            </label>
                            <div class="col-md-8">
                               <input class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" id="url" name="url" type="text" value="{{ old('url', $video->url) }}"> 
                               <small class="hint">Ensure url is embed version. (Eg. https://www.youtube.com/embed/XW0NCT027bQ)</small>                                      
                                        @if ($errors->has('url'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $errors->first('url') }}
                                            </strong>
                                        </span>
                                        @endif
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="status">
                                {{ __('Status') }}
                            </label>
                            <div class="col-md-8">
                                <select class="form-control custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" id="status" name="status">
                                    <option value="draft" {{old('status', $video->status)=="draft"? 'selected':''}}>
                                        Draft
                                    </option>
                                    <option value="published" {{old('status', $video->status)=="published"? 'selected':''}}>
                                        Published
                                    </option>
                                </select>
                                @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('status') }}
                                    </strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
