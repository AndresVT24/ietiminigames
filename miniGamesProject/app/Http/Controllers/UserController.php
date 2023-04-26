<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{   
    //ENVIA TODA LA INFORMACION DE LOS USUARIOS
    public function infoUsers()
    {
        $users= User::all();
        return view('admin', ['users' => $users]);
    }

    //ENCUENTRA UN USUARIO SEGUN EL ID Y ENVIA SU INFORMACION
    public function findUser($id)
    {
        $user= User::find($id);
        if ($user) {
            return response()->json(['success' => true, 'userInfo' => $user]);
        } else {
            return response()->json(['success' => false, 'message' => 'El usuario no se encontró.']);
        }
    }

    //ELIMINA A UN USUARIO SEGUN SU ID
    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'El usuario no se encontró.']);
        }
    }

    //MODIFICA A UN USUARIO SEGUN SU ID Y LOS DATOS QUE SON ENVIADOS MEDIANTE UN FORM
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->nick_name = $request->nick_name;
            $user->rol = $request->rol;
            $user->status = $request->status;
            $user->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'El usuario no se encontró.']);
        }
    }

}
