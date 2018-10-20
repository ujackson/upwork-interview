<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action {{request()->is('admin') ? 'active' : ''}}" href="{{route('home')}}">
        <i class="fa fa-home">
        </i>
        Dashboard
    </a>
    <a class="list-group-item list-group-item-action {{request()->is('admin/posts*') ? 'active' : ''}}" href="{{route('posts.index')}}">
        <i class="fas fa-newspaper">
        </i>
        Text Posts
    </a>
    <a class="list-group-item list-group-item-action {{request()->is('admin/videos*') ? 'active' : ''}}" href="{{route('videos.index')}}">
        <i class="fas fa-video">
        </i>
        Video Posts
    </a>
    <a class="list-group-item list-group-item-action {{request()->is('admin/comments*') ? 'active' : ''}}" href="{{route('comments.index')}}">
        <i class="fas fa-comments">
        </i>
        Comments
    </a>
</div>
