<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Ivas;
use App\Comida;
use App\Cliente;
use App\User;
use App\Comida_Venta;
use App\Mesa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VentaRequest;


class VentaController extends Controller
{


    public function index()
    {
      $ventas = Venta::latest('created_at')->get();

      return view('venta.index', compact('ventas'));
    }

    public function show($id)
    {

      $venta = Venta::findOrFail($id);
      $empleado = User::where('cedula' ,Auth::id())->first();

      return view('venta.show', compact('venta', 'empleado'));
    }



    public function create()
    {

      $comidas = Comida::where('tipo', '=', 'comida')->get();
      $combos = Comida::where('tipo', '=', 'combo')->get();
      $mesas = Mesa::all();
      
      return view('venta.create', compact('comidas', 'combos', 'mesas'));
    }

    /*la validación es disparada antes de que se cree el ingrediente*/
   

    public function edit($id)
    {
      $venta = Venta::findOrFail($id);
      $comidas = Comida::all();
      return view('venta.edit', compact('venta','comidas'));
    }

  public function guardarVenta(Request $request)
  {
        $comidas = $request->input('comidas'); // array con id y cantidad
        $ci_cliente = $request->input('cedula');
        $tipo_pago = $request->input('tipo_pago');
        $nombre = $request->input('nombre');
        $id_mesa = $request->input('mesa');

        $request->merge(['forma_pago' =>  $tipo_pago]);
        $request->merge(['numero_mesa' =>  $id_mesa]);

        if ($id_mesa != null) 
        {
           $mesa = Mesa::find($id_mesa);
          $mesa->estado = true;
          $mesa->save();
        }
        
        //return json_encode(['success' => false, "msg" => 'mensaje'])

        //seteo el empleado que inició sesión
        $request->merge(['ci_user' => Auth::id()]);
        //obtengo la fila del tipo de pago, para obtener su IVA
        $ivaCategorizado = Ivas::where('tipo_pago', '=', $tipo_pago)->first();
        //seteo el Iva correspondiente a la forma de pago
        $request->merge(['iva' => $ivaCategorizado->iva]);
        //Chequeo si existe, almacenando en una variable
        $cliente = Cliente::where('cedula', '=', $ci_cliente)->first();

        //si es nulo, crearlo
        if ($cliente == null) 
        {
          $comprador = new Cliente(['cedula' => $ci_cliente, 'nombre' => $nombre]);
          $comprador->save();
          $request->merge(['id_cliente' => $comprador->id]);
        }
        else
        {
          $request->merge(['id_cliente' => $cliente->id]);
        }

        if($id_mesa != null) 
        {
          $request->merge(['llevar' => false]);
        }
        if($id_mesa == null) 
        {
            $request->merge(['llevar' => true]);
        }

        $subtotal = 0;

        foreach($comidas as $food)
        {
            $comida = Comida::where('id', '=', $food['id'])->first();
            $precio_comida = $comida->precio;
            $subtotal = $subtotal + ($precio_comida * $food['cantidad']);        
        }
        $request->merge(['subtotal' => $subtotal]);

        $total = $subtotal + ($subtotal * ($ivaCategorizado->iva/100));

        $request->merge(['total' => $total]);

        $datos_venta = $request->only('subtotal', 'total', 'ci_user', 'iva', 
                                      'id_cliente', 'numero_mesa', 'llevar', 'forma_pago');

        $ventaNueva = Venta::create($datos_venta);      
        $ventaNueva->save();

        foreach($comidas as $key => $food)
        {
          $comida_venta = new Comida_Venta(['id_comida' => $food['id'],
                                            'id_venta' => $ventaNueva->id, 
                                            'cantidad'=> $food['cantidad']]);
          $comida_venta->save();
       }


       return json_encode(['success' => true, 'id_venta' => $ventaNueva->id]);
  }

  public function destroy($id)
    {
      Venta::find($id)->delete();

      return Redirect::back()->with('message','Operation Successful !');
    }


    public function deleteVentaComida($id_venta, $id_comida)
    {
        $relacion = Comida_Venta::where([
                    ['id_venta', '=', $id_venta],
                    ['id_comida', '=', $id_comida],
                    ])->first();
        $relacion->delete();

        return Redirect::back();
    }

    public function update($id, VentaRequest $request)
    {
      $venta = Venta::findOrFail($id);
      $venta->update($request->all());

      $comidas = $request->input('comida_id'); // ESTO VA A SER UN ARRAY CON TODOS LOS IDS! 
      $cantidades = $request->input('cantidad');

      foreach($comidas as $key => $co_id)
      {
        $comida_venta = new Comida_Venta(['id_venta' => $venta->id,
                                                      'id_comida' => $co->id, 
                                                      'cantidad'=> $cantidades[$key]]);
        $comida_venta->save();
      }

      return redirect('venta');
    }
}

