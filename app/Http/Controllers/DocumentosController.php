<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentosController extends Controller
{
    
    public function Dashboard()
    {
        return view('Documents.dashboard');
    }

    public function Detalles()
    {
        return view('Documents.details');
    }
    public function UploadNAS_UNIMARK(Request $request)
    {

            if($request->hasFile('UploadMe')){
                
                $file   = $request->file('UploadMe');
                $Unidad = $request->input('uploadUnidadNegocio');

                $name = Unidad . '/' . time() . '-' . $file->getClientOriginalName();
                $Minio = Storage::disk('s3')->put($name, file_get_contents($file), 'public');
                
                if($Minio){
                    $Url = Storage::disk('s3')->url($name);
                    return back()->with([
                        'status' => 'ok',
                        'message' => 'Archivo subido correctamente',
                        'path' => $Url
                    ]);
                }
                return back()->with([
                    'status' => 'error',
                    'message' => 'Error al subir el archivo'
                ]);
            
            }

            
        
        
    }
}
