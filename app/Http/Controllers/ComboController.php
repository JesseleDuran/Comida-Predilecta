<?php

namespace App\Http\Controllers;

use App\Comida;
use App\User;
use App\Comida_Comida;
use Illuminate\Http\Request;
use Input\Input;
use App\Http\Requests\ComidaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;



class ComboController extends Controller
{
    

    public function index()
    {
    	$combos = Comida::where('tipo', '=', 'combo')->get();

      $result = $this->cantidad_posibleCombos();
      dd($result);

    	return view('combo.index', compact('combos'));
    }

  	public function show($id)
  	{
  		$combo = Comida::findOrFail($id);

  		return view('combo.show', compact('combo'));
  	}

    public function create()
    {
      $comidas = Comida::where('tipo', '=', 'comida')->get(); 
      return view('combo.create', ['comidas' => $comidas]);
    }

    /*la validación es disparada antes de que se cree la comida*/
    public function store(ComidaRequest $request)
    {

      $request->merge(['tipo' => 'combo']);

      $nuevoCombo = Comida::create($request->all());
      
      $nuevoCombo->save();

      $comidas = $request->input('comida_id'); // ESTO VA A SER UN ARRAY CON TODOS LOS IDS! 
      $cantidades = $request->input('cantidad');


      foreach($comidas as $key => $in_id)
      {
        $comida_comida = new Comida_Comida(['id_comida' => $in_id,
                                                 'id_comida1' => $nuevoCombo->id, 
                                                 'cantidad'=> $cantidades[$key]]);
        $comida_comida->save();
      }
      flash()->success('El combo ha sido creado');
   
      return redirect('combo');
    }


    public function edit($id)
    {
      $combo = Comida::findOrFail($id);
      $comidas = \App\Comida::all(); 


      return view('combo.edit', compact('combo', 'comidas'));
    }

    public function update($id, ComidaRequest $request)
    {
      $combo = Comida::findOrFail($id);

      $combo->update($request->all());

      $comidas = $combo->comidaCombo; //obtengo los ingredientes de esa combo

      return redirect('combo');
    }



    public function destroy($id)
    {
      Comida::find($id)->delete();

      return Redirect::back()->with('message','Operation Successful !');
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

    protected function cantidad_posibleCombos()
    {
      $min = array();
      $arreglo = array();
      $comidasNecesaria = collect();

      $comidas = Comida::where('tipo', '=', 'comida')->get();
      
      $combos = Comida::where('tipo', '=', 'combo')->get();

      foreach ($combos as $combo)
      {
          foreach($combo->comidaCombo as $comida)
          {
            $comidasNecesaria = $comida->cantidad;
          }        
      }
      

      for ($i=0; $i < sizeof($comidas) ; $i++) 
      {
          $cantPosibleComidas = $this->cantidad_posibleComidas($comidas[$i]->id); 
          array_push($arreglo, $cantPosibleComidas);    
      }

      foreach ($combos as $key => $combo) 
      {
          $min = collect($arreglo[$key]->cant_posible/$comidasNecesaria[$key])->min();
      }
     
      return $min;
    }

    
}
