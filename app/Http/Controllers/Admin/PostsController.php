<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title'  => 'required|string',
            'body'   => 'required|string',
            'photo'  => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'status' => 'required|string',

        ]);
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $path          = $request->file('photo')->store('posts', 'public');
            $data['photo'] = $path;
        }
        try {
            Post::create($data);
            return redirect()->route('posts.index')->with('status', 'Post created successfully');
        } catch (\Exception $e) {
            return redirect()->route('posts.create')->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $data = request()->validate([
            'title'  => 'required|string',
            'body'   => 'required|string',
            'photo'  => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'status' => 'required|string',

        ]);
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $path          = $request->file('photo')->store('posts', 'public');
            $data['photo'] = $path;
        }
        try {
            $post->update($data);
            return redirect()->route('posts.index')->with('status', 'Post updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('posts.edit')->with('error', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        try {
            $post->delete();
            return redirect()->route('posts.index')->with('status', 'Post deleted successfully');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}
