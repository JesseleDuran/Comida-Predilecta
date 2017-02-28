<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{

	public function __construct()
  	{
      	$this->middleware('auth');
  	}

    //user_id => Auth::user()->id;
    //request['user_id'] = Auth::id();

	//$ingrediente = new Ingrediente(request->all():
    //Auth::user()->ingredientes()->save($ingrediente));



   /* $request = $request->all();
    $request['user_id'] = Auth::id();*/

}
