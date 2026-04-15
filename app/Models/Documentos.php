<?php
namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Storage;

class Documentos extends Model {
    protected $table = "documento";
    protected $primaryKey = "DOCUMENTO";

    public function RegCertificados()
    {
        return $this->hasMany(Adjuntos::class, 'DOC_ID', 'DOCUMENTO')->where('CATEGORIA', 'CERTIFICADOS');
    }
    public function RegDossiers()
    {
        return $this->hasMany(Adjuntos::class, 'DOC_ID', 'DOCUMENTO')->where('CATEGORIA', 'DOSSIERS');
    }
    public function LegalDoc()
    {
        return $this->hasMany(Adjuntos::class, 'DOC_ID', 'DOCUMENTO');
    }

    public static function getMetricas()
    {
        return Documentos::from('documento as t1')
        ->join('documento_adjunto as t0', 't0.DOC_ID', '=', 't1.DOCUMENTO')
        ->select(
            't1.DEPARTAMENTO',
            DB::raw('COUNT(t0.DOC_ID) as total'),
            DB::raw('SUM(t0.DOCUMENT_SIZE) as total_size')
        )
        ->where('t1.ACTIVO', 'S')
        ->groupBy('t1.DEPARTAMENTO')
        ->get()->toArray();

    }

    
    
}