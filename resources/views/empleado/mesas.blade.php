@extends('app')

@section('content')

	<h1>Mesas</h1>

	<hr/>

	@foreach ($mesas as $mesa)
		<article>
			<a href="{{ url('/mesa', $mesa->id) }}">Mesa: {{ $mesa->id }} </a>

			@if($mesa->estado == false)
				<h5>Estado: Desocupado</h5>
			@endif	

		</article>
	@endforeach

@stop