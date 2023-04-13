<?php
use Illuminate\Support\Facades\Auth;

function index(){
    // Verificar si el usuario está autenticado
    if (Auth::check()) {
        // Obtener el email del usuario autenticado
        $email = Auth::user()->email;

        // Usar el email en tu lógica de negocio
        // ...

        return view('index', ['email' => $email]);
    } else {
        // El usuario no está autenticado, redirigir a la página de inicio de sesión
        return redirect()->route('login');
    }
}
?>