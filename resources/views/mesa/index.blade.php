@extends('app')

@section('content')

	<h1>Mesas</h1>

	<hr/>

	@foreach ($mesas as $mesa)
		<article>
			<h2>
				<a href="{{ url('/mesa', $mesa->id) }}">
					{{ $mesa->nombre }}</a>
			</h2>

			<div class="id">Mesa:{{ $mesa->id }}</div>
			@if($mesa->estado == false)
				<h5>Estado: Desocupado</h5>
			@endif	

		</article>
	@endforeach

@stop