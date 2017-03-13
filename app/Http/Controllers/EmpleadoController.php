<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Mesa;
use App\User;
use App\Venta;
use App\Comida;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    public function mesas()
    {
    	$mesas = Mesa::all();
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


    public function showFood($id)
  	{
  		$mesa = Mesa::findOrFail($id);
        $empleado = User::where('cedula' ,Auth::id())->first();
        $combos = Comida::where('tipo', '=', 'combo')->get();
        $comidas = Comida::where('tipo', '=', 'comida')->get();
        $arreglo = array();
        $arreglo2 = array();

      for ($i=0; $i < sizeof($comidas) ; $i++) 
      {
          $cantPosibleComidas = $this->cantidad_posibleComidas($comidas[$i]->id); 
          array_push($arreglo, $cantPosibleComidas);    
      }

      for ($i=0; $i < sizeof($combos) ; $i++) 
      {
          $cantPosiblecombos = $this->cantidad_posibleCombos($combos[$i]->id); 
          array_push($arreglo2, $cantPosiblecombos);    
      }

  		return view('empleado.food', compact('empleado', 'mesa', 'comidas', 'combos', 'arreglo', 'arreglo2'));
  	}

    public function showFoodLlevar()
    {
        $empleado = User::where('cedula' ,Auth::id())->first();
        $combos = Comida::where('tipo', '=', 'combo')->get();
        $comidas = Comida::where('tipo', '=', 'comida')->get();

        return view('empleado.llevar', compact('empleado', 'comidas', 'combos'));
    }

    protected function cantidad_posibleComidas($id)
    {
      /*SELECT comida.nombre, min((ingrediente.cantidad / comida_ingrediente.cantidad)) as cant_posible
      FROM comida_ingrediente 
      INNER JOIN comida
      ON comida_ingrediente.id_comida = comida.id
      INNER JOIN ingrediente
      ON comida_ingrediente.id_ingrediente = ingrediente.id 
      group by comida.nombre;*/
      $cantPosibleComidas = DB::table('comida_ingrediente')
                          ->select(DB::raw('min((ingrediente.cantidad / comida_ingrediente.cantidad)) AS cant_posible, comida.nombre'))
                          ->join('comida', 'comida_ingrediente.id_comida', '=', 'comida.id')
                          ->join('ingrediente', 'comida_ingrediente.id_ingrediente', '=', 'ingrediente.id')->where('comida.id', $id)
                          ->groupBy('comida.nombre')
                          ->first();

      return $cantPosibleComidas;
    }

    protected function cantidad_posibleCombos($id)
    {
      $arreglo = array();//max de comidas 
      $necesaria = array();
      $comidas = Comida::where('tipo', '=', 'comida')->get();
      $combo = Comida::findOrFail($id);
      $arrayResult = array();

      for ($i=0; $i < sizeof($comidas) ; $i++) 
      {
          $cantPosibleComidas = $this->cantidad_posibleComidas($comidas[$i]->id); 
          array_push($arreglo, $cantPosibleComidas);    
      }

     foreach ($combo->comidaCombo as $key => $comida)
     {
        if ($comida->comida->nombre == $arreglo[$key]->nombre) 
        { 
            $cantidades = ($arreglo[$key]->cant_posible/$comida->cantidad);
            array_push($arrayResult, $cantidades);
        }
     } 

      $min = min($arrayResult);
      
     
      return $min;
    }


}
