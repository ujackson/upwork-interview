<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Video;
use App\Post;
use App\Comment;

class AdminController extends Controller
{
    public function index()
    {
    	$users_count = User::count();
    	$posts_count = Post::count();
    	$videos_count = Video::count();
    	$comments_count = Comment::count();
    	return view('admin.index', compact('users_count', 'posts_count', 'videos_count', 'comments_count'));
    }
}
