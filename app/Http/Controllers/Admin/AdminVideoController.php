<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class AdminVideoController extends Controller
{
    public function show()
    {
        $videos = Video::get();
        return view('admin.video_show', compact('videos'));
    }

    public function create()
    {
        return view('admin.video_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'video_id' => 'required'
        ]);

        $video = new Video();
        $video->video_id = $request->video_id;
        $video->caption = $request->caption;
        $video->language_id = $request->language_id;
        $video->save();

        return redirect()->route('admin_video_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $video_data = Video::where('id',$id)->first();
        return view('admin.video_edit', compact('video_data'));
    }

    public function update(Request $request,$id) 
    {
        $request->validate([
            'caption' => 'required',
            'video_id' => 'required'
        ]);

        $video_data = Video::where('id',$id)->first();
        $video_data->video_id = $request->video_id;
        $video_data->caption = $request->caption;
        $video_data->language_id = $request->language_id;
        $video_data->update();

        return redirect()->route('admin_video_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $video_data = Video::where('id',$id)->first();
        $video_data->delete();

        return redirect()->route('admin_video_show')->with('success', 'Data is deleted successfully.');

    }
}
