<?php

namespace App\Http\Controllers;
use App\Comida;
use App\Comida_Ingrediente;
use Illuminate\Http\Request;
use Input\Input;
use App\Http\Requests\ComidaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class ComidaController extends Controller
{

    public function index()
    {
    	$comidas = Comida::where('tipo', '=', 'comida')->get();
      $arreglo = array();

      for ($i=0; $i < sizeof($comidas) ; $i++) 
      {
          $cantPosibleComidas = $this->cantidad_posibleComidas($comidas[$i]->id); 
          array_push($arreglo, $cantPosibleComidas);    
      }

    	return view('comida.index', compact('comidas', 'arreglo'));
    }

  	public function show($id)
  	{
  		$comida = Comida::findOrFail($id);

  		return view('comida.show', compact('comida'));
  	}

    public function create()
    {
      $ingredientes = \App\Ingrediente::all(); 
      return view('comida.create', ['ingredientes' => $ingredientes]);
    }

    /*la validación es disparada antes de que se cree la comida*/
    public function store(ComidaRequest $request)
    {

      $request->merge(['tipo' => 'comida']);
      $nuevaComida = Comida::create($request->all());

      $nuevaComida->save();

      $ingredientes = $request->input('ingrediente_id'); // ESTO VA A SER UN ARRAY CON TODOS LOS IDS! 
      $cantidades = $request->input('cantidad');

      foreach($ingredientes as $key => $in_id)
      {
        $ingrediente_comida = new Comida_Ingrediente(['id_ingrediente' => $in_id,
                                                      'id_comida' => $nuevaComida->id, 
                                                      'cantidad'=> $cantidades[$key]]);
        $ingrediente_comida->save();
      }
   
      return redirect('comida');
    }

    public function edit($id)
    {
      $comida = Comida::findOrFail($id);
      $ingredientes = \App\Ingrediente::all(); 


      return view('comida.edit', compact('comida', 'ingredientes'));
    }

    public function update($id, ComidaRequest $request)
    {
      $updatedComida = Comida::findOrFail($id);
      $updatedComida->update($request->all());

      $ingredientes = $request->input('ingrediente_id'); // ESTO VA A SER UN ARRAY CON TODOS LOS IDS! 
      $cantidades = $request->input('cantidad');

      foreach($ingredientes as $key => $in_id)
      {
        $ingrediente_comida = new Comida_Ingrediente(['id_ingrediente' => $in_id,
                                                      'id_comida' => $updatedComida->id, 
                                                      'cantidad'=> $cantidades[$key]]);
        $ingrediente_comida->save();
      }

      //$ingredientes = $comida->comidaIngredientes;
      return redirect('comida');
    }

    public function destroy($id)
    { 
        try 
        {
          Comida::find($id)->delete();
          return Redirect::back()->with('message','Operation Successful !');
        }
      catch (\Illuminate\Database\QueryException $qe) 
      {
          return redirect()->back()->withErrors(['No puede eliminar una comida que está siendo utilizada por un Combo.']);
      }
    }

    public function deleteComidaIngrediente($id_comida, $id_ingrediente)
    {
        $relacion = Comida_Ingrediente::where([
                    ['id_ingrediente', '=', $id_ingrediente],
                    ['id_comida', '=', $id_comida],
                    ])->first();
        $relacion->delete();

        return Redirect::back();
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

    

}
