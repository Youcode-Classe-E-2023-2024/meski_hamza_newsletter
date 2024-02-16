<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use Illuminate\Support\Facades\Mail;

class SendTmeplateController extends Controller
{
    public function send(Template $template) {
        $usersEmails = request()->check;
        dd($usersEmails);
        $boilerplate = $template->boilerplate;
        foreach ($usersEmails as $userEmail) {
            Mail::send('hello', compact('template', 'boilerplate'), function($message) use ($userEmail) {
                $message->to($userEmail)->subject('Newsletter');
            });
        }

        return redirect()->route('main');
    }
}
