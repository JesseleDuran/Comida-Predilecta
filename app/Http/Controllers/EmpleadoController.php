<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Mesa;
use App\User;

class EmpleadoController extends Controller
{
    public function mesas()
    {
    	$mesas = Mesa::latest('created_at')->get();

    	return view('empleado/mesas', compact('mesas'));
    }

    public function miPerfil()
    {
    	$empleado = User::where('cedula' ,Auth::id())->first();

    	return view('empleado.miPerfil', compact('empleado'));
    }
}
