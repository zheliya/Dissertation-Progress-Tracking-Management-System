<?php

namespace App\Http\Controllers;
use App\Models\chapter;
use App\Models\project;
use ZipArchive;

use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class ZipController extends Controller
{

    public function download($project_id)
    {
/*         $zip = new ZipArchive();

        $project = project::findOrFail($project_id);
        $zipFileName = 'project_'.$project->title.'_chapters.zip';
        $tempFilePath = storage_path('app/temp/'.$zipFileName);
        $filesToZip = [];

        // Retrieve chapters for the specified project
        $chapters = Chapter::where('project_id', $project_id)->get(); // Replace Chapter with your actual model name and project_id with the actual column name

        foreach ($chapters as $chapter) {
            $fileName = $chapter->submition; // Replace file_name with the actual column name

            // Build the file path
            $filePath = storage_path('app/chapters_tasks/'.$fileName);

            // Check if the file exists before adding it to the zip
            if (file_exists($filePath)) {
                $filesToZip[] = $filePath;
            }
        }

        if ($zip->open($tempFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($filesToZip as $file) {
                $zip->addFile($file, basename($file));
            }

            $zip->close();

            return response()->download($tempFilePath)->deleteFileAfterSend(true);
        }

        return back()->with('error', 'Failed to create the zip file.'); */







        $project = project::findOrFail($project_id);
        $zipFileName = 'project_'.$project->title.'_chapters.zip';
        $tempFilePath = storage_path('app/temp/'.$zipFileName);
        $filesToZip = [];

        // Retrieve chapters for the specified project
        $chapters = Chapter::where('project_id', $project_id)->get(); // Replace Chapter with your actual model name and project_id with the actual column name

        // Create a new ZipArchive instance
        $zip = new ZipArchive();

        // Open the zip file for writing
        if ($zip->open($tempFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($chapters as $chapter) {
                $fileName = $chapter->submition; // Replace file_name with the actual column name

                // Build the file path
                $filePath = storage_path('../../../storage/app/chapters_tasks/'.$fileName);

                // Check if the file exists before adding it to the zip
                if (file_exists($filePath)) {
                    // Add the file to the zip archive
                    $zip->addFile($filePath, basename($filePath));
                }
            }

            // Close the zip file
            $zip->close();

            // Download the zip file
            return response()->download($tempFilePath)->deleteFileAfterSend(true);
        }

        return back()->with('error', 'Failed to create the zip file.');


    }
}
