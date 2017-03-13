<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function comidasVendidas()
    {

       $comidasVendidas = DB::table('comida_venta')
                          ->select(DB::raw('sum(comida_venta.cantidad) AS suma_cantidad, comida.nombre'))
                          ->join('comida', 'comida_venta.id_comida', '=', 'comida.id')->where('tipo', 'comida') //asi .. el select siempre arriba! 
                          ->orderBy('suma_cantidad', 'desc')
                          ->groupBy('comida.nombre')
                          ->get();

    	 return view('graficos.grafico', compact('comidasVendidas'));
    }

    public function combosVendidos()
    {
       $combosVendidos = DB::table('comida_venta')
                          ->select(DB::raw('sum(comida_venta.cantidad) AS suma_cantidad, comida.nombre'))
                          ->join('comida', 'comida_venta.id_comida', '=', 'comida.id')->where('tipo', 'combo') //asi .. el select siempre arriba! 
                          ->orderBy('suma_cantidad', 'desc')
                          ->groupBy('comida.nombre')
                          ->get();

       return view('graficos.comboStats', compact('combosVendidos'));
    }

    public function mesasVentas()
    {

       $mesasVentas = DB::table('venta')
                          ->select(DB::raw('count(*) AS suma_cantidad, mesa.id'))
                          ->join('mesa', 'venta.numero_mesa', '=', 'mesa.id') //asi .. el select siempre arriba! 
                          ->orderBy('suma_cantidad', 'desc')
                          ->groupBy('mesa.id')
                          ->get();

       return view('graficos.mesasStats', compact('mesasVentas'));
    }

    public function horasVentas()
    {

       $horasVentasPresenciales = DB::table('venta')
                          ->select(DB::raw('EXTRACT(hour from venta.created_at) as hora'), DB::raw('count(*) as suma_cantidad'))
                          ->where('llevar', 'false')
                          ->orderBy('suma_cantidad', 'desc')
                          ->groupBy('hora')
                          ->get();

        $horasVentasLlevar = DB::table('venta')
                          ->select(DB::raw('EXTRACT(hour from venta.created_at) as hora'), DB::raw('count(*) as suma_cantidad'))
                          ->where('llevar', 'true')
                          ->orderBy('suma_cantidad', 'desc')
                          ->groupBy('hora')
                          ->get();                  

       return view('graficos.horasStats', compact('horasVentasPresenciales', 'horasVentasLlevar'));
    }

    public function diasVentas()
    {

       $diasVentas = DB::table('venta')
                          ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as suma_cantidad'))
                          ->orderBy('suma_cantidad', 'desc')
                          ->groupBy('date')
                          ->get();

       return view('graficos.diasStats', compact('diasVentas'));
    }
}
