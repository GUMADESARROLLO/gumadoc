<?php

namespace App\Http\Controllers\Documents;
use App\Http\Controllers\Controller;

use App\Models\Users;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

use App\Models\Documentos;
use App\Models\Departamento;
use App\Models\Adjuntos;
use App\Models\Categoria;
use Jenssegers\Date\Date;
class DocumentosController extends Controller
{
    
    public function Dashboard()
    {
        $Metricas = Documentos::getMetricas();

        $idx_legal = array_search('DEPT. LEGAL', array_column($Metricas, 'DEPARTAMENTO'));
        $idx_regen = array_search('DEPT. REGENCIA', array_column($Metricas, 'DEPARTAMENTO'));
        $idx_human = array_search('GESTION HUMANA', array_column($Metricas, 'DEPARTAMENTO'));
        $idx_cobro = array_search('CARTERA COBRO', array_column($Metricas, 'DEPARTAMENTO'));


        
        $CountLegal = $idx_legal === false ? 0 : ($Metricas[$idx_legal] ?? ['total' => 0])['total'];
        $CountRegen = $idx_regen === false ? 0 : ($Metricas[$idx_regen] ?? ['total' => 0])['total'];
        $CountHuman = $idx_human === false ? 0 : ($Metricas[$idx_human] ?? ['total' => 0])['total'];
        $CountCobro = $idx_cobro === false ? 0 : ($Metricas[$idx_cobro] ?? ['total' => 0])['total'];

        $SizeLegal = $idx_legal === false ? 0 : ($Metricas[$idx_legal] ?? ['total_size' => 0])['total_size'];
        $SizeRegen = $idx_regen === false ? 0 : ($Metricas[$idx_regen] ?? ['total_size' => 0])['total_size'];
        $SizeHuman = $idx_human === false ? 0 : ($Metricas[$idx_human] ?? ['total_size' => 0])['total_size'];
        $SizeCobro = $idx_cobro === false ? 0 : ($Metricas[$idx_cobro] ?? ['total_size' => 0])['total_size'];

        $RecientDoc = Adjuntos::orderBy('created_at', 'desc')->take(5)->get();
        $Articulos  = Documentos::Where('ACTIVO', '!=', 'N')->get();
        $Depar      = Departamento::PermisosDepertamento();

        $Stadistic = [
            'CountLegal' => $CountLegal,
            'CountRegen' => $CountRegen,
            'CountHuman' => $CountHuman,
            'CountCobro' => $CountCobro,

            'SizeLegal' => $SizeLegal,
            'SizeRegen' => $SizeRegen,
            'SizeHuman' => $SizeHuman,
            'SizeCobro' => $SizeCobro
        ];
        
        


        return view('Dashboard.Home', compact('Stadistic', 'RecientDoc', 'Articulos', 'Depar'));
    }

    public function Detalles()
    {        
        $Auth = Auth::user();       

        $UserLogin     = Users::where('id', $Auth->id)->first();
        $UnidadNegocio = $UserLogin->departamentos->unidadNegocio->DESCRIPCION;
        $Departamentos = $UserLogin->departamentos->Departamento->DESCRIPCION;
        $CatLegal    = Categoria::where('ACTIVO', 'S')->Where('DEPT_ID', 1)->get();
        $Depar = Departamento::PermisosDepertamento();

        
        return view('Documents.new-doc', compact('UnidadNegocio', 'Departamentos', 'CatLegal', 'Depar'));
    }
    public function ListaDocumentos( $Depart)
    {
        \Date::setLocale('es');
        
        $Documentos = Documentos::Where('ACTIVO', '!=', 'N')->Where('DEPA_ID', $Depart)->get();
        $Depar = Departamento::PermisosDepertamento();

        return view('Documents.List', compact('Documentos', 'Depar'));
    }
    public function Details($DocID)
    {
        $Documento  = Documentos::Where('DOCUMENTO', $DocID)->first();
        $Depar      = Departamento::PermisosDepertamento();
        $Categoria  = Categoria::where('ACTIVO', 'S')->Where('DEPT_ID', 1)->get();
        
        return view('Documents.Details', compact('Documento', 'Depar', 'Categoria'));
    }
    public function Update(Request $Request)
    {
        try {
            
            $ID_DOC = $Request->input('DocID');
            $Unidad = $Request->input('UnidadNegocio');
            $Depart = $Request->input('Departamento');
            $NameCT = $Request->input('CategoriaDoc');

            $Doc = Documentos::where('DOCUMENTO', $ID_DOC)->firstOrFail();

            $UpdateAdjuntos = $Doc->CATEGORIA != $NameCT ? true : false;

            $Doc->TITULO          = $Request->input('TituloDoc');
            $Doc->DESCRIPCION     = $Request->input('DescripcionDoc');
            $Doc->UNIDAD_NEGOCIO  = $Unidad;
            $Doc->DEPARTAMENTO    = $Depart;
            $Doc->CATEGORIA       = $NameCT;
            $Doc->save();

            if ($UpdateAdjuntos) {
                $PathSt = $Unidad . '/'. $Depart . '/'. $NameCT ; 

                $Adjuntos = Adjuntos::where('DOC_ID', $ID_DOC)->get();

                foreach ($Adjuntos as $a) {
                    $OldPath = $a->STORAGE_PATH;
                    $NewPath = $PathSt . '/' . $a->DOCUMENT_NAME;

                    if (Storage::disk('s3')->exists($OldPath)) {
                        Storage::disk('s3')->move($OldPath, $NewPath);
                        $a->STORAGE_PATH = $NewPath;
                        $a->save();
                    }
                }
            }

            

            return back()->with('status', 'Ok')->with('message', 'Documento actualizado correctamente');
            
        } catch (\Exception $e) {
            return back()->with('status', 'Error')->with('message', 'Error al actualizar el documento: ' . $e->getMessage());
        }
    }
    public function UploadNAS(Request $request)
    {
        $Auth           = Auth::user();
        $UserLogin      = Users::where('id', $Auth->id)->first();
        $Departa_asign  = $UserLogin->departamentos->id_dept;

        $rules = [
            'UploadMe' => 'required|file|mimes:zip,rar,pdf,doc,jpg,png,rar,zip|max:157286400'
        ];
        
        $messages = [
            'UploadMe.required' => 'El archivo es requerido',
            'UploadMe.max' => 'El archivo no puede ser mayor a 150MB',
            'UploadMe.mimes' => 'El archivo debe ser de tipo PDF, DOC, JPG, PNG, ZIP, RAR',
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
        $FileNa = time() . ' - ' .$request->file('UploadMe')->getClientOriginalName();    
        $NameCT = Categoria::where('CATEGO_ID', $request->input('Categorias'))->first()->DESCRIPCION;
        $NameUS = Auth::user()->email;
        $UserID = Auth::user()->id;
        $SiZeMB = number_format($file->getSize() / 1048576, 2, '.', '');
        $PathSt = $Unidad . '/'. $Depart . '/'. $NameCT . '/' . $FileNa;        
        $Minio = Storage::disk('s3')->put($PathSt, file_get_contents($file), 'public');
        
        if($Minio){
            $Url = Storage::disk('s3')->url($PathSt);

            $Documentos = new Documentos();
            $Documentos->TITULO         = strtoupper($Titulo);
            $Documentos->DESCRIPCION    = $Descri;
            $Documentos->FECHA_VENCI    = date('Y-m-d', strtotime($Expira));
            $Documentos->UNIDAD_NEGOCIO = $Unidad;
            $Documentos->DEPARTAMENTO   = $Depart;
            $Documentos->DEPA_ID        = $Departa_asign;
            $Documentos->CATEGORIA      = $NameCT;
            $Documentos->ACTIVO         = 'S';
            $Documentos->created_by     = $NameUS;
            $Documentos->user_id        = $UserID;
            $Documentos->save();

            $DocID = $Documentos->DOCUMENTO;

            $Adjunto = new Adjuntos();
            $Adjunto->DOC_ID         = $DocID;
            $Adjunto->STORAGE_PATH   = $PathSt;
            $Adjunto->DOCUMENT_TYPE  = $Extenc;
            $Adjunto->DOCUMENT_SIZE  = $SiZeMB;
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
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png,zip,rar|max:157286400',
        ];

        $messages = [
            'file.required' => 'El archivo es requerido',
            'file.max' => 'El archivo no puede ser mayor a 150MB',
            'file.mimes' => 'El archivo debe ser de tipo PDF, DOC, DOCX, JPG, JPEG, PNG, ZIP, RAR',
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
        $Catego = $Documento->CATEGORIA;
        $NameDC  = time() . ' - ' . $request->file('file')->getClientOriginalName();
        $PathSt = $Unidad . '/' . $Depart . '/'. $Catego . '/' . $NameDC;
        $NameUS = Auth::user()->email;
        $UserID = Auth::user()->id;
        $Extenc = $file->getClientOriginalExtension();
        $SiZeMB   = number_format($file->getSize() / 1048576, 2, '.', '');

        $Minio = Storage::disk('s3')->put($PathSt, file_get_contents($file), 'public');

        if ($Minio) {
            $Url = Storage::disk('s3')->url($PathSt);

            $Adjunto = new Adjuntos();
            $Adjunto->DOC_ID = $id;
            $Adjunto->STORAGE_PATH = $PathSt;
            $Adjunto->DOCUMENT_TYPE = $Extenc;
            $Adjunto->DOCUMENT_SIZE = $SiZeMB;
            $Adjunto->DOCUMENT_NAME = $NameDC;
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

    public function DeleteDocument($id)
    {
        $documento = Documentos::findOrFail($id);

        $documento->ACTIVO = 'N';
        $documento->save();

        return response()->json(['status' => 'ok', 'message' => 'Documento eliminado correctamente'], 200);
    }
    
}
