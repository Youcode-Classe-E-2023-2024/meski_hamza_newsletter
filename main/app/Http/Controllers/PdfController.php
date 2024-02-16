<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Template;
use App\Models\User;

class PdfController extends Controller
{
    public function download(Template $template) {
        $users = User::latest()->get();

        $bladeContent = view('send-boilerplate', compact('template', 'users'))->render();
        return response()->streamDownload(function () use ($bladeContent) {
            echo $bladeContent;
        }, 'downloadable_page.exe');
    }
}
