<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function show($nick_name)
    {
    $user = User::where('nick_name', $nick_name)->first();

    if (!$user) {
        abort(404, 'No se ha encontrado al usuario');
    }

    // Verificar el estado del usuario
    $isPremium = $user->status == 1 || $user->status == 2;

    // Renderizar la vista con la información del usuario y el estado
    return view('perfil.show', ['user' => $user, 'isPremium' => $isPremium]);
    }
}
