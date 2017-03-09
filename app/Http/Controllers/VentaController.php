<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;

class VentaController extends Controller
{


    //user_id => Auth::user()->id;
    //request['user_id'] = Auth::id();

	//$ingrediente = new Ingrediente(request->all():
    //Auth::user()->ingredientes()->save($ingrediente));



   /* $request = $request->all();
    $request['user_id'] = Auth::id();*/



    

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

      $comidas = Comida::where('tipo', '=', 'comida')->get();
      $combos = Comida::where('tipo', '=', 'combo')->get();
      $mesas = Mesa::all();
      
      return view('venta.create', compact('comidas', 'combos', 'mesas'));
    }

    /*la validación es disparada antes de que se cree el ingrediente*/
    public function store(VentaRequest $request)
    {

      //seteo el empleado que inició sesión
      $request->merge(['ci_user' => Auth::id()]);

      //obtengo la fila del tipo de pago, para obtener su IVA
      $ivaCategorizado = Ivas::where('tipo_pago', '=', $request->forma_pago)->first();

      //seteo el Iva correspondiente a la forma de pago
      $request->merge(['iva' => $ivaCategorizado->iva]);

      //obtengo la cédula del cliente
      $CI_cliente = $request->input('ci_cliente');

      //Chequeo si existe, almacenando en una variable
      $cliente = Cliente::where('ci', '=', $CI_cliente)->first();

      //si es nulo, crearlo
      if ($cliente == null) 
      {
        $comprador = new Cliente(['ci' => $CI_cliente, 'nombre' => $request->nombreCliente]);
        $comprador->save();
        $request->merge(['id_cliente' => $comprador->id]);
      }
      else
      {
        $request->merge(['id_cliente' => $cliente->id]);
      }

      $datos_venta = $request->only('subtotal', 'total', 'ci_user', 'iva', 
                                    'id_cliente', 'numero_mesa', 'llevar', 'forma_pago');

      $ventaNueva = Venta::create($datos_venta);      
      $ventaNueva->save();

      $comidas = $request->input('comida_id'); // ESTO VA A SER UN ARRAY CON TODOS LOS IDS! 
      $cantidades = $request->input('cantidad');

      foreach($comidas as $key => $food_id)
      {
        $comida_venta = new Comida_Venta(['id_comida' => $food_id,
                                          'id_venta' => $nuevaVenta->id, 
                                          'cantidad'=> $cantidades[$key]]);
        $ingrediente_comida->save();
      }

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
