<?php
namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserDepartamento extends Model {
    protected $table = "user_deptamento";
    protected $primaryKey = "id_user_dept";

    public function unidadNegocio()
    {
        return $this->hasOne(UnidadNegocio::class, 'PREFIJO', 'id_und');
    }

    public function Departamento()
    {
        return $this->hasOne(Departamento::class, 'ID_DEPARTAMENTO', 'id_dept');
    }




    
}