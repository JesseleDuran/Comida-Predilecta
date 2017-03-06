<?php

namespace App\Http\Controllers;
use App\Comida;
use App\Comida_Ingrediente;
use Illuminate\Http\Request;
use Input\Input;
use App\Http\Requests\ComidaRequest;
use Illuminate\Support\Facades\Redirect;


class ComidaController extends Controller
{

    public function index()
    {
    	$comidas = $comidas = Comida::where('tipo', '=', 'comida')->get();

    	return view('comida.index', compact('comidas'));
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
      $comida = Comida::findOrFail($id);

      $comida->update($request->all());

      $ingredientes = $comida->comidaIngredientes; //obtengo los ingredientes de esa comida

      return redirect('comida');
    }

    public function destroy($id)
    {
      Comida::find($id)->delete();

      return Redirect::back()->with('message','Operation Successful !');
    }

}
