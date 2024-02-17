<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Template;
use App\Models\User;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function download(Template $template)
    {
        $users = User::latest()->get();

        // Render the blade view to HTML
        $htmlContent = view('send-boilerplate', compact('template', 'users'))->render();

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content
        $dompdf->loadHtml($htmlContent);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Get the generated PDF content
        $pdfContent = $dompdf->output();

        // Store the PDF file in storage
        $pdfFilePath = 'pdf/' . uniqid() . '.pdf';
        Storage::put($pdfFilePath, $pdfContent);

        // Download the PDF file
        return response()->download(storage_path('app/' . $pdfFilePath))->deleteFileAfterSend(true);
    }
}
