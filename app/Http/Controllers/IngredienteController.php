<?php

namespace App\Http\Controllers;
use App\Ingrediente;
use Carbon\Carbon;
use App\Http\Requests\IngredienteRequest;
use Illuminate\Http\Request;


class IngredienteController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

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
    public function store(IngredienteRequest $request)
    {
      
      /*$input = Request::all();*/
      /*$input['published_at'] = Carbon::now(); */                                
      /*$input = Request::get('nombre');

      $ingrediente = new Ingrediente();
      $ingrediente->nombre = $input['nombre'];*/

      Ingrediente::create($request->all());

      flash()->success('El ingrediente ha sido creado');



      return redirect('ingrediente');
    }

    public function edit($id)
    {
      $ingrediente = Ingrediente::findOrFail($id);
      return view('ingrediente.edit', compact('ingrediente'));
    }

    public function update($id, IngredienteRequest $request)
    {
      $ingrediente = Ingrediente::findOrFail($id);

      $ingrediente->update($request->all());
      return redirect('ingrediente');
    }




}
