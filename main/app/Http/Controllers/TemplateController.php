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
//        dd(\request()->file());

        $validated = request()->validate([
            'name' => 'required|min:5',
            'subject' => 'required|min:5',
            'content' => 'required|min:5',
            'boilerplate' => 'required',
            'image' => 'required|max:4048'
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
            'name' => 'required|min:5',
            'subject' => 'required|min:5',
            'content' => 'required|min:5',
            'image' => 'required|image|max:4048'
        ]);

        $template->update([
            'name' => $validated['name'],
            'subject' => $validated['subject'],
            'content' => $validated['content'],
        ]);

        $template->clearMediaCollection('media');

        $template->addMediaFromRequest('image')->toMediaCollection('media');

        return redirect()->route('mytemplates');
    }


    public function destroy(Template $template) {
        $template->delete();
        return redirect()->route('mytemplates');
    }
}
