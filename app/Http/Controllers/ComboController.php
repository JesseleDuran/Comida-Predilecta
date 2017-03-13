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
      $arreglo = array();//max de comidas 
    	$combos = Comida::where('tipo', '=', 'combo')->get();

      for ($i=0; $i < sizeof($combos) ; $i++) 
      {
          $cantPosiblecombos = $this->cantidad_posibleCombos($combos[$i]->id); 
          array_push($arreglo, $cantPosiblecombos);    
      }

    	return view('combo.index', compact('combos', 'arreglo'));
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
      $comidas = Comida::where('tipo', '=', 'comida')->get();


      return view('combo.edit', compact('combo', 'comidas'));
    }

    public function update($id, ComidaRequest $request)
    {
      $combo = Comida::findOrFail($id);
      $combo->update($request->all());

      $comidas = $request->input('comida_id'); // ESTO VA A SER UN ARRAY CON TODOS LOS IDS! 
      $cantidades = $request->input('cantidad');


      foreach($comidas as $key => $in_id)
      {
        $comida_comida = new Comida_Comida(['id_comida' => $in_id,
                                                 'id_comida1' => $combo->id, 
                                                 'cantidad'=> $cantidades[$key]]);
        $comida_comida->save();
      }

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

    public function deleteComboComida($id_combo, $id_comida)
    {
        $relacion = Comida_Comida::where([
                    ['id_comida', '=', $id_comida],
                    ['id_comida1', '=', $id_combo],
                    ])->first();
        $relacion->delete();

        return Redirect::back();
    }

    
}
