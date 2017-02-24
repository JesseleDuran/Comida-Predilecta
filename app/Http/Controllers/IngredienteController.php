<?php

namespace App\Http\Controllers;
use App\Ingrediente;
use Carbon\Carbon;
use Request/CreateIngredienteRequest


use Request;

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

    public function store(CreateIngredienteRequest $request)
    {
      
      $input = Request::all();
      /*$input['published_at'] = Carbon::now(); */                                
      /*$input = Request::get('nombre');

      $ingrediente = new Ingrediente();
      $ingrediente->nombre = $input['nombre'];*/

      Ingrediente::create($input);

      return redirect('ingrediente');
    }




}
