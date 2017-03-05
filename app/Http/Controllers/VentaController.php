<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{


    //user_id => Auth::user()->id;
    //request['user_id'] = Auth::id();

	//$ingrediente = new Ingrediente(request->all():
    //Auth::user()->ingredientes()->save($ingrediente));



   /* $request = $request->all();
    $request['user_id'] = Auth::id();*/





    public function __construct()
  {
      $this->middleware('auth');
  }

    public function index()
    {
      $ventas = Venta::latest('created_at')->get();

      return view('venta.index', compact('ventas'));
    }

    public function show($id)
    {

      $venta = Venta::findOrFail($id);

      return view('venta.show', compact('venta'));
    }

    public function create()
    {
      
      return view('venta.create');
    }

    /*la validación es disparada antes de que se cree el ingrediente*/
    public function store(VentaRequest $request)
    {

      $request = $request->all();
      $request['ci_user'] = Auth::ci();

      Venta::create($request->all());

      flash()->success('La venta ha sido creado');

      return ('venta');
    }

    public function edit($id)
    {
      $venta = Venta::findOrFail($id);
      return view('venta.edit', compact('venta'));
    }

    public function update($id, VentaRequest $request)
    {
      $venta = Venta::findOrFail($id);

      $venta->update($request->all());
      return redirect('venta');
    }

}
