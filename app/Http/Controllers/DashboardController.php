<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $rol = $user->rol;

        // Lógica adicional basada en el rol del usuario
        if ($rol === 'admin') {
            $data = [
                'mensaje' => 'Bienvenido, administrador.',
                // Otros datos específicos para el rol de administrador
            ];
        } else {
            $data = [
                'mensaje' => 'Bienvenido, usuario.',
                // Otros datos específicos para el usuario regular
            ];
        }

        return view('almacen', $data);
    }
}
