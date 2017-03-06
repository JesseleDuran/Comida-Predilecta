<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ivas;


class IvasController extends Controller
{
    public function index()
    {
    	$ivas = Ivas::latest('created_at')->get();

    	return view('ivas.index', compact('ivas'));
    }

  	public function show($id)
  	{

  		$iva = Ivas::findOrFail($id);

  		return view('ivas.show', compact('iva'));

  	}

    public function create()
    {
      
      return view('ivas.create');
    }

    /*la validación es disparada antes de que se cree el iva*/
    public function store(Request $request)
    {

      Ivas::create($request->all());

      flash()->success('El iva ha sido creado');

      return Redirect::back()->with('message','Operation Successful !');
    }

    public function edit($id)
    {
      $iva = Ivas::findOrFail($id);
      return view('ivas.edit', compact('iva'));
    }

    public function update($id, Request $request)
    {
      $iva = Ivas::findOrFail($id);

      $iva->update($request->all());
      return redirect('ivas');
    }

    
}
