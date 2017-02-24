<?php

namespace App\Http\Controllers;
use App\Ingrediente;
use Carbon\Carbon;
use App\Http\Requests\CreateIngredienteRequest;


class IngredienteController extends Controller
{
    public function index()
    {
    	$ingredientes = Ingrediente::latest('created_at')->get();

    	return view('ingrediente.index', compact('ingredientes'));
    }

  	public function show($id)
  	{

  		$ingrediente = Ingrediente::findOrFail($id);

  		return view('ingrediente.show', compact('ingrediente'));

  	}

    public function create()
    {
      
      return view('ingrediente.create');
    }

    /*la validación es disparada antes de que se cree el ingrediente*/
    public function store(CreateIngredienteRequest $request)
    {
      
      /*$input = Request::all();*/
      /*$input['published_at'] = Carbon::now(); */                                
      /*$input = Request::get('nombre');

      $ingrediente = new Ingrediente();
      $ingrediente->nombre = $input['nombre'];*/

      Ingrediente::create($request->all);

      return redirect('ingrediente');
    }




}
