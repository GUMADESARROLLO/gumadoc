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

    public function UploadAttachment(Request $request)
    {
        

        $rules = [
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:25600'
        ];

        $messages = [
            'file.required' => 'El archivo es requerido',
            'file.max' => 'El archivo no puede ser mayor a 25MB',
            'file.mimes' => 'El archivo debe ser de tipo PDF, DOC, DOCX, JPG, JPEG, PNG',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->messages()->first()], 422);
        }

        $file = $request->file('file');

        $id = $request->input('num_doc');
        $Documento = Documentos::find($id);

        if (!$Documento) {
            return response()->json(['status' => 'error', 'message' => 'Documento no encontrado'], 404);
        }

        $Unidad = $Documento->UNIDAD_NEGOCIO;
        $Depart = $Documento->DEPARTAMENTO;
        $PathSt = $Unidad . '/' . $Depart . '/' . time() . '-' . $file->getClientOriginalName();
        $NameUS = Auth::user()->email;
        $UserID = Auth::user()->id;
        $Extenc = $file->getClientOriginalExtension();
        $FileNa = $file->getClientOriginalName();

        $Minio = Storage::disk('s3')->put($PathSt, file_get_contents($file), 'public');

        if ($Minio) {
            $Url = Storage::disk('s3')->url($PathSt);

            $Adjunto = new Adjuntos();
            $Adjunto->DOC_ID = $id;
            $Adjunto->STORAGE_PATH = $PathSt;
            $Adjunto->DOCUMENT_TYPE = $Extenc;
            $Adjunto->DOCUMENT_NAME = $FileNa;
            $Adjunto->created_by = $NameUS;
            $Adjunto->user_id = $UserID;
            $Adjunto->save();

            return response()->json(['status' => 'ok', 'message' => 'Archivo subido correctamente', 'path' => $Url], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'Error al subir el archivo'], 422);
    }
    public function DownloadAttachment($id)
    {
        $adjunto = Adjuntos::findOrFail($id);

        $filePath = $adjunto->STORAGE_PATH;
        $fileName = $adjunto->FILE_NAME ?? basename($filePath);

        $fileUrl = Storage::disk('s3')->temporaryUrl(
            $filePath,
            now()->addMinutes(5),
            [
                'ResponseContentDisposition' => 'attachment; filename="' . addslashes($fileName) . '"'
            ]
        );

        return redirect($fileUrl);
    }

    public function DeleteAttachment($id)
    {
        $adjunto = Adjuntos::findOrFail($id);

        Storage::disk('s3')->delete($adjunto->STORAGE_PATH);

        $adjunto->delete();

        return response()->json(['status' => 'ok', 'message' => 'Archivo eliminado correctamente'], 200);
    }
    
}
