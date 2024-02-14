<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function uploadVideo() {

        $validated = request()->validate([
            'description' => 'required|min:5',
            'video' => 'required|max:100000',
        ]);

        $video = Video::create($validated);
        $video->addMediaFromRequest('video')->toMediaCollection('videos');

        return redirect()->route('main');
    }

    public function displayVideo() {
    }

    public function videoForm() {
        return view('videos.upload-video-form');
    }
}
