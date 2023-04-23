<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users= User::all();
        return view('admin', ['users' => $users]);
    }
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

    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json(['user' => $user]);
        } else {
            return response()->json(['success' => false, 'message' => 'El usuario no se encontró.']);
        }
    }

}
