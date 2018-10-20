@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('partials.sidebar')
        </div>
        <div class="col-md-9">

            @if (session('status'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('status') }}
                </div>
                @endif

            <div class="card">
                
                <div class="card-header">
                    Video Posts
                    <a class="btn btn-primary float-right" href="{{route('videos.create')}}" role="button">
                        <i class="fa fa-plus">
                        </i>
                        Add New Video Post
                    </a>
                </div>
                <div class="card-body">
                    @if(count($videos) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Title
                                    </th>
                                    <th scope="col">
                                        Status
                                    </th>
                                    <th scope="col">
                                        Created
                                    </th>
                                    <th scope="col">
                                        Actions
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($videos as $video)
                                <tr>
                                  
                                    <td>
                                    {{$video->title}}
                                    </td>
                                    <td>
                   <span class="badge badge-{{$video->status == 'published' ? 'success' : 'secondary'}}">{{ucfirst($video->status)}}</span>                     
                                    
                                    </td>
                                    <td>
                                        {{$video->created_at->format('d-m-Y')}}
                                    </td>
                                    <td>
           <form method="post" action="{{route('videos.destroy', $video->id)}}">
            @csrf
            @method('DELETE')
 <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
  <a href="{{route('videos.show', $video->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
  <a href="{{route('videos.edit', $video->id)}}" class="btn btn-secondary"><i class="fas fa-edit"></i> Edit</a>
  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete record?')"><i class="far fa-trash-alt"></i> Delete</button>
</div>
</form>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-light" role="alert">
                        -- No records to display --
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
