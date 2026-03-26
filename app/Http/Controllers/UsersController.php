<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Validator;

use App\Models\Users;
use App\Models\UnidadNegocio;
use App\Models\Departamento;
use App\Models\UserDepartamento;

use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function list(Request $request)
    {
        $Users = Users::getUsuers($request);
        $UNID  = UnidadNegocio::getUNID();

        return view('Users.users', ['Users' => $Users, 'UNID' => $UNID]);
    }

    public function getDepartamento(Request $request)
    {

        $UNID = UnidadNegocio::Where('PREFIJO', $request->unidad_negocio)->first()->ID_UNIDAD ?? 0 ;

        $DEPTO = Departamento::Where('ID_UNIDAD', $UNID)->get();

        return $DEPTO;
        
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->passes()) {

            $user = new Users();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->password = Hash::make($request->password);
            $user->Activo   = 'S';
            $user->save();

            // RECUPERA EL ID QUE SE LE ASIGNO AL USUARIO
            $id = $user->id;
            $usrDep = new UserDepartamento();
            $usrDep->id_user = $id;
            $usrDep->id_und  = $request->unidad_negocio ?? null;
            $usrDep->id_dept = $request->departamento ?? null;
            
            $usrDep->save();
            

            return redirect('Users')->with('success', 'El usuario se ha creado correctamente con ID: ' . $id);
        } else {
            $errors = $validator->errors();
            $fieldWithError = array_key_first($errors->toArray());

            return redirect('Users')
                ->withErrors($validator)
                ->withInput()
                ->with('error', "El campo '$fieldWithError' tiene un error, por favor revise y vuelva a intentar");
        }
    }

    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        if ($validator->passes()) {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);   
            $user->save();

            $UND_NEGO = $request->unidad_negocio ?? null;
            if ($UND_NEGO != 'N/D') {
                $usrDep = UserDepartamento::where('id_user', $id)->first();

                if (!$usrDep) {
                    $usrDep = new UserDepartamento();
                    $usrDep->id_user = $id;
                    $usrDep->id_und  = $request->unidad_negocio ?? null;
                    $usrDep->id_dept = $request->departamento ?? null;
                }else {
                    $usrDep->id_und  = $request->unidad_negocio ?? $usrDep->id_und;
                    $usrDep->id_dept = $request->departamento ?? $usrDep->id_dept;
                    
                }

                $usrDep->save();
            }

            
            return redirect('Users')->with('success', 'El usuario se ha actualizado correctamente con ID: ' . $user->id);
        }

        $errors = $validator->errors();
        $fieldWithError = array_key_first($errors->toArray());

        return redirect('Users')
            ->withErrors($validator)
            ->withInput()
            ->with('error', "El campo '$fieldWithError' tiene un error, por favor revise y vuelva a intentar");
    }

    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->Activo = 'N';
        $user->save();

        return redirect('Users')->with('success', 'El usuario se ha desactivado correctamente.');
    }

}