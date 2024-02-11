<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplateController extends Controller
{
    public function manage_template() {
        return view('templates.manage-template');
    }

    public function show(Template $template) {
        return view('templates.show-template', compact( 'template'));
    }

    public function store() {
        $validated = request()->validate([
            'name' => 'required|min:5',
            'subject' => 'required|min:5',
            'content' => 'required|min:5',
            'boilerplate' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $validated['user_id'] = auth()->id();

        $template = Template::create($validated);

        $template->addMediaFromRequest('image')->toMediaCollection('media');

        return redirect()->route('main');
    }


    public function edit(Template $template) {
        $editing = true;
        return view('templates.manage-template', compact('template', 'editing'));
    }

    public function update(Template $template) {
        $validated = request()->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $template->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        $template->addMediaFromRequest('image')->toMediaCollection('image');

        return redirect()->route('main');
    }
    public function destroy(Template $template) {
        $template->delete();
        return redirect()->route('main');
    }
}
