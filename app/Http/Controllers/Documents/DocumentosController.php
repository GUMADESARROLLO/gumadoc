<?php

namespace App\Http\Controllers\Documents;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class DocumentosController extends Controller
{
    
    public function Dashboard()
    {
        //return view('Documents.dashboard');
        return view('Dashboard.Home');
    }

    public function Detalles()
    {
        return view('Documents.details');
    }
    public function UploadNAS(Request $request)
    {
        $rules = [
            'UploadMe' => 'required|file|mimes:zip,rar,pdf,doc,jpg,png|max:25600'
        ];
        
        $messages = [
            'UploadMe.required' => 'El archivo es requerido',
            'UploadMe.max' => 'El archivo no puede ser mayor a 25MB',
            'UploadMe.mimes' => 'El archivo debe ser de tipo PDF, DOC, JPG, PNG',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return back()->with(['status' => 'error', 'message' => $validator->messages()->first()], 422)->header('Content-Type', 'application/json');
        }
        
        $file   = $request->file('UploadMe');
        $Unidad = $request->input('uploadUnidadNegocio');
        
        $name = $Unidad . '/' . time() . '-' . $file->getClientOriginalName();
        $Minio = Storage::disk('s3')->put($name, file_get_contents($file), 'public');
        
        if($Minio){
            $Url = Storage::disk('s3')->url($name);
            return back()->with(['status' => 'ok', 'message' => 'Archivo subido correctamente', 'path' => $Url], 200)->header('Content-Type', 'application/json');
        }
        
        return back()->with(['status' => 'error', 'message' => 'Error al subir el archivo'], 422)->header('Content-Type', 'application/json');

    }
    
}
