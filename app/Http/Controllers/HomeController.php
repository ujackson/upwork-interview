<?php

namespace App\Http\Controllers;

use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin');
        }
        
        $comments = Comment::where('user_id', auth()->user()->id)->latest()->get();
        return view('home', compact('comments'));
    }
}
