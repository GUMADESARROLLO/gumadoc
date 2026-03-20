<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function list(Request $request)
    {

        $Users = Users::getUsuers($request);

        return view('Users.users', ['Users' => $Users]);
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->passes()) {

            $user = new Users();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->password = Hash::make($request->password);        
            $user->Activo   = 'S';    
            $user->save();

            $id = $user->id;

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

}