<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function store() {
        $validated = request()->validate([
            'description' => 'required|min:5',
            'image' => 'required|max:4048'
        ]);

        $image = Image::create($validated);

        $image->addMediaFromRequest('image')->toMediaCollection('media');

        return redirect()->route('imageForm');
    }

    public function imageForm() {
        return view('images.upload-image-form');
    }

    public function show() {
        $images = Image::latest()->get();
        return view('images.display-images', compact('images'));
    }
}
