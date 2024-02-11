<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\User;

class MainController extends Controller
{
    public function index() {
        $boilerplate = 1;
        $templates = Template::where('boilerplate', 'newsletter1')->latest()->get();

        $users = User::all();
        return view('main', compact('templates', 'users', 'boilerplate'));
    }

    public function boilerplate($boilerplate) {
        $templates = Template::where('boilerplate', 'newsletter2')->latest()->get();
        if($boilerplate == 1) $templates = Template::where('boilerplate', 'newsletter1')->latest()->get();
        if($boilerplate == 2) $templates = Template::where('boilerplate', 'newsletter2')->latest()->get();
        if($boilerplate == 3) $templates = Template::where('boilerplate', 'newsletter3')->latest()->get();

        $users = User::all();
        return view('main', compact('templates', 'users', 'boilerplate'));
    }

    public function renderBoilerplate(Template $template) {
        $fromEmail = true;
        return view('send-boilerplate', compact('template', 'fromEmail'));
    }
}
