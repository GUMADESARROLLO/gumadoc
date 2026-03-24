<?php

namespace App\Http\Controllers\Documents;
use App\Http\Controllers\Controller;

use App\Models\Users;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

use App\Models\Documentos;
use App\Models\Adjuntos;

class DocumentosController extends Controller
{
    
    public function Dashboard()
    {
        //return view('Documents.dashboard');
        return view('Dashboard.Home');
    }

    public function Detalles()
    {        
        $Auth = Auth::user();       

        $UserLogin = Users::where('id', $Auth->id)->first();
        $UnidadNegocio = $UserLogin->departamentos->unidadNegocio->DESCRIPCION;
        $Departamentos = $UserLogin->departamentos->Departamento->DESCRIPCION;
        
        return view('Documents.new-doc', compact('UnidadNegocio', 'Departamentos'));
    }
    public function ListaDocumentos()
    {
        $Documentos = Documentos::Where('ACTIVO', '!=', 'N')->get();
        return view('Documents.List', compact('Documentos'));
    }
    public function Details($DocID)
    {
        $Documento = Documentos::Where('DOCUMENTO', $DocID)->first();
        return view('Documents.Details', compact('Documento'));
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

        $Titulo = $request->input('TituloDoc');
        $Descri = $request->input('descripcion');
        $Expira = $request->input('dt_range');
        $Unidad = $request->input('UnidadNegocio');
        $Depart = $request->input('Departamento');
        $Extenc = $request->file('UploadMe')->getClientOriginalExtension();    
        $FileNa = $request->file('UploadMe')->getClientOriginalName();         
        $PathSt = $Unidad . '/'. $Depart . '/' . time() . '-' . $file->getClientOriginalName();
        $NameUS = Auth::user()->email;
        $UserID = Auth::user()->id;
        
        $Minio = Storage::disk('s3')->put($PathSt, file_get_contents($file), 'public');
        
        if($Minio){
            $Url = Storage::disk('s3')->url($PathSt);

            $Documentos = new Documentos();
            $Documentos->TITULO         = strtoupper($Titulo);
            $Documentos->DESCRIPCION    = $Descri;
            $Documentos->FECHA_VENCI    = date('Y-m-d', strtotime($Expira));
            $Documentos->UNIDAD_NEGOCIO = $Unidad;
            $Documentos->DEPARTAMENTO   = $Depart;
            $Documentos->ACTIVO         = 'S';
            $Documentos->created_by     = $NameUS;
            $Documentos->user_id        = $UserID;
            $Documentos->save();

            $DocID = $Documentos->DOCUMENTO;

            $Adjunto = new Adjuntos();
            $Adjunto->DOC_ID         = $DocID;
            $Adjunto->STORAGE_PATH   = $PathSt;
            $Adjunto->DOCUMENT_TYPE  = $Extenc;
            $Adjunto->DOCUMENT_NAME  = $FileNa;
            $Adjunto->created_by     = $NameUS;
            $Adjunto->user_id        = $UserID;
            $Adjunto->save();


            return back()->with(['status' => 'ok', 'message' => 'Archivo subido correctamente', 'path' => $Url], 200)->header('Content-Type', 'application/json');
        }
        
        return back()->with(['status' => 'error', 'message' => 'Error al subir el archivo'], 422)->header('Content-Type', 'application/json');

    }
    
}
