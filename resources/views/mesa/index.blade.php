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

			<div class="id">Numero:{{ $mesa->id }}</div>
			<div class="estado">Estado:{{ $mesa->estado }}</div>

		</article>
	@endforeach

@stop