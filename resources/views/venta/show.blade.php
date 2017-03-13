@extends('appUser')

@section('content')

	<h1>Venta: {{ $venta->id }}</h1>


            <h5> Compra: </h5>

            <ul>
            @foreach ($venta->comidaVenta as $comida)

             <li> {{ $comida->cantidad }} {{ $comida->comida->nombre }} </li>
            @endforeach
           </ul>
            <h5>Subtotal</h5>
            <p> {{ $venta->subtotal }}</p>
            <h5>Forma de pago</h5>
            <p> {{ $venta->forma_pago }}</p>
            <h5>IVA</h5>
                <p> {{ $venta->iva }}%</p>
            <h5>Total</h5>

          <p> {{ $venta->total }}</p>
            <h5>Número de Mesa</h5>
                <p> {{ $venta->numero_mesa }}</p>
            <h5>Llevar</h5>
            @if($venta->llevar == false)
            <p>No</p>
          @elseif ($venta->llevar == true)
            <p>Sí</p>
            @endif 
            <h5>CI del Empleado</h5>
             <p> {{ $venta->ci_user }}</p>
            <h5>ID del Comprador</h5>
             <p> {{ $venta->id_cliente }}</p>
            
   
    
@stop