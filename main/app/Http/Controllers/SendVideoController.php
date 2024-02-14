<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Mail;

class SendVideoController extends Controller
{
    public function send(Video $template) {
        $usersEmails = request()->check;
        $isVideo = true;
        foreach ($usersEmails as $userEmail) {
            Mail::send('hello', compact('template', 'isVideo'), function($message) use ($userEmail) {
                $message->to($userEmail)->subject('Newsletter');
            });
        }

        return redirect()->route('main');
    }
}
