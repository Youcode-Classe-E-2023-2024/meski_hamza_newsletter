<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Image;

class TemplateController extends Controller
{
    public function manage_template() {
        $images = Image::latest()->get();
        return view('templates.manage-template', compact('images'));
    }

    public function show(Template $template) {
        return view('templates.show-template', compact( 'template'));
    }

    public function store() {
//        dd(\request());

        $validated = request()->validate([
            'name' => 'required|min:5',
            'subject' => 'required|min:5',
            'content' => 'required|min:5',
            'boilerplate' => 'required',
            'image' => 'required'
        ]);

        $validated['user_id'] = auth()->id();

        $template = Template::create($validated);

//        $template->addMediaFromRequest('image')->toMediaCollection('media');

        return redirect()->route('templates.manage-template');
    }

    public function edit(Template $template) {
        $editing = true;
        return view('templates.manage-template', compact('template', 'editing'));
    }

    public function update(Template $template) {
        $validated = request()->validate([
            'name' => 'required|min:5',
            'subject' => 'required|min:5',
            'content' => 'required|min:5',
//            'image' => 'required|image|max:4048'
        ]);

        $template->update([
            'name' => $validated['name'],
            'subject' => $validated['subject'],
            'content' => $validated['content'],
        ]);

//        $template->clearMediaCollection('media');
//
//        $template->addMediaFromRequest('image')->toMediaCollection('media');

        return redirect()->route('mytemplates');
    }


    public function destroy(Template $template) {
        $template->update(['is_deleted' => true]);
        return redirect()->route('mytemplates');
    }

    public function restore(Template $template) {
        $template->update(['is_deleted' => false]);
        return redirect()->route('deletedTemplates');
    }
}
