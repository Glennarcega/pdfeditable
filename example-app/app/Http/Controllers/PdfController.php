<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function showForm()
    {
        return view('pdf-upload');
    }

    public function uploadPdf(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048', // Max file size 2MB
        ]);

        // Store the PDF file
        if ($file = $request->file('pdf_file')) {
            $path = $file->store('pdfs', 'public');

            // Pass the file path to the view
            return view('pdf-upload', ['pdfPath' => $path]);
        }

        return back()->withErrors(['pdf_file' => 'File upload failed!']);
    }
}
