<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComidaController extends Controller
{
    public function __construct()
  	{
      	$this->middleware('auth');
  	}

    public function index()
    {
    	$comidas = Comida::latest('created_at')->get();

    	return view('comida.index', compact('comidas'));
    }

  	public function show($id)
  	{
  		$comida = Comida::findOrFail($id);

  		return view('comida.show', compact('comida'));
  	}

    public function create()
    {
      
      return view('comida.create');
    }

    /*la validación es disparada antes de que se cree el comida*/
    public function store(ComidaRequest $request)
    {
   
      Comida::create($request->all());

      return redirect('comida');
    }

    public function edit($id)
    {
      $comida = Comida::findOrFail($id);
      return view('comida.edit', compact('comida'));
    }

    public function update($id, ComidaRequest $request)
    {
      $comida = Comida::findOrFail($id);

      $comida->update($request->all());
      return redirect('comida');
    }
}
