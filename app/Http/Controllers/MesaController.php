<?php

namespace App\Http\Controllers;

use App\Mesa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MesaController extends Controller
{
    
    public function index()
    {
    	$mesas = Mesa::latest('created_at')->get();
      $mesas->toArray();

    	return view('mesa.index', compact('mesas'));
    }

  	public function show($id)
  	{

  		$mesa = Mesa::findOrFail($id);

  		return view('mesa.show', compact('mesa'));

  	}

    public function create()
    {   
      return view('mesa.create');
    }

    /*la validación es disparada antes de que se cree el ingrediente*/
    public function store()
    {
     	$mesa = new Mesa(['estado' => 'false']);
        $mesa->save();

      flash()->success('La mesa ha sido creada');

      return Redirect::back()->with('message','Operation Successful !');
    }

    public function edit($id)
    {
      $mesa = Mesa::findOrFail($id);
      return view('mesa.edit', compact('mesa'));
    }

    public function update($id, Request $request)
    {
      $mesa = Mesa::findOrFail($id);

      $mesa->update($request->all());
      return redirect('mesa');
    }

    public function destroy($id)
    {
      try 
      {
        Mesa::find($id)->delete();
        return Redirect::back()->with('message','Operation Successful !');
      } 
      catch (\Illuminate\Database\QueryException $qe) 
      {
          return redirect()->back()->withErrors(['No puede eliminar una Mesa Ocupada']);
      }
    }

    public function cambiarEstado(Request $request)
    {
      $mesa = Mesa::findOrFail($request->input('mesa'));
      $mesa->estado = false;
      $mesa->save();

      return json_encode(['success' => true]);

    }

    
}
