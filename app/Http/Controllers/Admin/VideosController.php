<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
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
            'url'  => 'required|url',
            'status' => 'required|string',

            


        ]);
        try {
            Video::create($data);
            return redirect()->route('videos.index')->with('status', 'Video post created successfully');
        } catch (\Exception $e) {
            return redirect()->route('videos.create')->with('error', $e->getMessage());
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
        $video = Video::findOrFail($id);
            return view('admin.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
            return view('admin.videos.edit', compact('video'));
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
        $video = Video::findOrFail($id);

            $data = request()->validate([
            'title'  => 'required|string',
            'body'   => 'required|string',
            'url'  => 'required|url',
            'status' => 'required|string',

        ]);
        try {
            $video->update($data);
            return redirect()->route('videos.index')->with('status', 'Video post updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('videos.edit')->with('error', $e->getMessage());
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
        $video = Video::findOrFail($id);
             try {
            $video->delete();
            return redirect()->route('videos.index')->with('status', 'Video post deleted successfully');
        } catch (\Exception $e) {
           \Log::error($e->getMessage());
        }
        }
    
}
