<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Vish4395\LaravelFileViewer\LaravelFileViewer;
use Storage;
use App\Models\Adjuntos;

class FilePreviewController extends Controller
{
    public function filePreview($AttachmentID)
    {
        $attachment = Adjuntos::findOrFail($AttachmentID);

        $filePath = $attachment->STORAGE_PATH;
        $fileExt  = strtolower($attachment->DOCUMENT_TYPE);
        $disk     = 's3';

        $fileUrl = Storage::disk($disk)->temporaryUrl(
            $filePath,
            now()->addMinutes(5),
            [
                'ResponseContentDisposition' => 'inline'
            ]
        );

        // Si es PDF, abrir directo en navegador
        if ($fileExt === 'pdf') {
            return redirect($fileUrl);
        }

        // Todo lo demás, usar LaravelFileViewer
        return LaravelFileViewer::show(
            $filePath,   // nombre/título del archivo
            $filePath,   // nombre mostrado
            $fileUrl,    // URL temporal de S3
            $disk
        );
    }
}