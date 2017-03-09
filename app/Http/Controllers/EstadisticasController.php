<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function comidasVendidas()
    {
    	$comida_venta = Comida_Venta::all();

    	$comidasVendidas = Comida::where('id', '=', $comida_venta->id_comida)->get(); //obtengo las comidas que han sido compradas

    	//cálcular cuántas veces se han comprado las comidas compradas
    	foreach($comidasVendidas->id as $key => $co_id)
      	{
      		$cantidad
        	
      	}

    	return view('comida.index', compact('comidas'));
    }
}
