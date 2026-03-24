<?php
namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UnidadNegocio extends Model {
    protected $table = "unidad_negocio";
    protected $primaryKey = "ID_UNIDAD";


    public static function getUNID() {
        return UnidadNegocio::where('ACTIVO', '!=', 'N')->get();
    }


    
}