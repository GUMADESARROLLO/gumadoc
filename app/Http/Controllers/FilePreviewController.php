<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Vish4395\LaravelFileViewer\LaravelFileViewer;
use Storage;
use App\Models\Adjuntos;

class FilePreviewController extends Controller
{
    public function filePreview($AttachmentID) {
        


        $filePath = Adjuntos::find($AttachmentID)->STORAGE_PATH;
        $disk = 's3';
        $fileUrl = Storage::disk($disk)->url($filePath);
        $fileData = [
            [
                'label' => __('Label'),
                'value' => "Value"
            ]
        ];

        return LaravelFileViewer::show($filePath, $filePath, $fileUrl, $disk);
    }
}