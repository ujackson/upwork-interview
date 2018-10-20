<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $comments = Comment::all();
       return view('admin.comments.index', compact('comments'));
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        try {
            $comment->delete();
            return redirect()->route('comments.index')->with('status', 'Comment deleted successfully');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}
