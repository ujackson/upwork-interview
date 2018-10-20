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
                    Comments
                </div>
                <div class="card-body">
                    @if(count($comments) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        User
                                    </th>
                                    <th scope="col">
                                        Type
                                    </th>
                                     <th scope="col">
                                        Comment
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
                                @foreach($comments as $comment)
                                <tr>
                                  
                                    <td>
                                    {{$comment->user->name}}
                                    </td>
                                    <td>                                 
                                    {{ $comment->commentable_type }}
                                    </td>
                                    <td>                                 
                                    {!! $comment->body !!}
                                    </td>
                                    <td>
                                        {{$comment->created_at->format('d-m-Y')}}
                                    </td>
                                    <td>
           <form method="comment" action="{{route('comments.destroy', $comment->id)}}">
            @csrf
            @method('DELETE')
<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete record?')"><i class="far fa-trash-alt"></i> Delete</button>
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
