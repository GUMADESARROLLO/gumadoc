<?php
namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Documentos extends Model {
    protected $table = "documento";
    protected $primaryKey = "DOCUMENTO";

    public function Archivos()
    {
        return $this->hasMany(Adjuntos::class, 'DOC_ID', 'DOCUMENTO');
    }
    
}