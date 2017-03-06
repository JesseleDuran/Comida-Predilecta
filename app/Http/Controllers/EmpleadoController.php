<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Mesa;
use App\User;
use App\Venta;

class EmpleadoController extends Controller
{
    public function mesas()
    {
    	$mesas = Mesa::latest('created_at')->get();
        $mesas->toArray();
        $empleado = User::where('cedula' ,Auth::id())->first();

    	return view('empleado/mesas', compact('mesas', 'empleado'));
    }

    public function miPerfil()
    {
    	$empleado = User::where('cedula' ,Auth::id())->first();

    	return view('empleado.miPerfil', compact('empleado'));
    }

    public function misVentas()
    {
    	$empleado = User::where('cedula' ,Auth::id())->first();
    	$ventas = Venta::where('ci_user' ,Auth::id())->get();

    	return view('empleado.misVentas', compact('ventas', 'empleado'));
    }


    public function showFood($mesa)
  	{
  		$mesa = Mesa::findOrFail($id);
        $empleado = User::where('cedula' ,Auth::id())->first();

  		return view('empleado.comidaDisponible', compact('mesa'));
  	}
}
