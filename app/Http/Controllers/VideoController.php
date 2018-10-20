<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Comment;

class VideoController extends Controller
{
    public function index()
    {
    	$videos = Video::published()->latest()->paginate(12);
    	return view('videos.index', compact('videos'));
    }

     public function show($slug)
    {
    	$video = Video::whereSlug($slug)->firstOrFail();
    	return view('videos.show', compact('video'));
    }

    public function comment(Request $request, $id)
    {
    	$video = Video::findOrFail($id);
    	$data = request()->validate([
            'comment'   => 'required|string',

        ]);

         try {
         	$comment = new Comment(['user_id' => auth()->user()->id, 'body' => $request->comment]);
            $video->comments()->save($comment);
            return back()->with('status', 'Comment submitted successfully');
        } catch (\Exception $e) {
            return \Log::error($e->getMessage());
        }
    }
}
