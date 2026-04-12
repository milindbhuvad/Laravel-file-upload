<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\files_upload;

class FileUplaodController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png|max:2048', // Max file size of 2MB
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move(public_path('uploads'), $filename);

            // Save file information to the database
            files_upload::create([
                'file_path' => $path
            ]);

            return back()->with('success', 'File uploaded successfully.');
        }
    }

    public function multiple_uploads(Request $request)
    {
        $request->validate([
            'files' => 'required|array|min:1',
            'files.*' => 'file|mimes:jpeg,png|max:2048', // Max file size of 2MB for each file
        ]);
        
        if ($request->hasFile('files')) {
            $files = array();
            foreach ($request->file('files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);

                $files[] = 'uploads/' . $filename;
            }

            // Save file information to the database
            files_upload::create([
                'file_path' => json_encode($files)
            ]);

            return back()->with('success', 'Files uploaded successfully.');
        }
    }
}
