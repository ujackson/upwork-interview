<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function index()
    {
    	$posts = Post::published()->latest()->paginate(12);
    	return view('posts.index', compact('posts'));
    }

     public function show($slug)
    {
    	$post = Post::whereSlug($slug)->firstOrFail();
    	return view('posts.show', compact('post'));
    }

    public function comment(Request $request, $id)
    {
    	$post = Post::findOrFail($id);
    	$data = request()->validate([
            'comment'   => 'required|string',

        ]);

         try {
         	$comment = new Comment(['user_id' => auth()->user()->id, 'body' => $request->comment]);
            $post->comments()->save($comment);
            return back()->with('status', 'Comment submitted successfully');
        } catch (\Exception $e) {
            return \Log::error($e->getMessage());
        }
    }
}
