<?php
namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Departamento extends Model {
    protected $table = "departamento";
    protected $primaryKey = "ID_DEPARTAMENTO";


    public static function PermisosDepertamento()
    {   
        $Auth             = Auth::user();

        if (in_array($Auth->rol_id, [2, 4])) {
            $Departamento = Departamento::all();
        } else {
            $UserLogin      = Users::where('id', $Auth->id)->first();
            $Departa_asign  = $UserLogin->departamentos->id_dept;
            $Departamento   = Departamento::where('ID_DEPARTAMENTO', $Departa_asign)->get();
        }
        return $Departamento;
    }


    
}