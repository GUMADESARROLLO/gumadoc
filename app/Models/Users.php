<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users extends Model {
    protected $table = "users";
    protected $primaryKey = "id";


    public function departamentos()
    {
        return $this->hasOne(UserDepartamento::class, 'id_user', 'id');
    }
    public function Rol()
    {
        return $this->hasOne(Rol::class, 'id', 'rol_id');
    }


    public static function getUsuers(Request $request) {
        return Users::where('activo', '!=', 'N')->get();
    }

    public static function getRoles() {
        return Rol::Where('activo', '!=', 'N')->get();
    }
}