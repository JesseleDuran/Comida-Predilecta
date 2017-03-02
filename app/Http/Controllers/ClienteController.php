<?php

namespace App\Http\Controllers;

use App\Cliente;
use Carbon\Carbon;
use App\Http\Requests\ClienteRequest;


class ClienteController extends Controller
{
    public function __construct()
  {
      $this->middleware('auth');
  }

    public function index()
    {
    	$clientes = Cliente::latest('created_at')->get();

    	return view('cliente.index', compact('clientes'));
    }

  	public function show($id)
  	{

  		$cliente = Cliente::findOrFail($id);

  		return view('cliente.show', compact('cliente'));

  	}

    public function create()
    {
      
      return view('cliente.create');
    }

    /*la validación es disparada antes de que se cree el ingrediente*/
    public function store(ClienteRequest $request)
    {

      Cliente::create($request->all());

      flash()->success('El cliente ha sido creado');

      return redirect('cliente');
    }

    public function edit($id)
    {
      $cliente = Cliente::findOrFail($id);
      return view('cliente.edit', compact('cliente'));
    }

    public function update($id, ClienteRequest $request)
    {
      $cliente = Cliente::findOrFail($id);

      $cliente->update($request->all());
      return redirect('cliente');
    }
}
