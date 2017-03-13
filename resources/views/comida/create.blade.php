@extends('app')

@section('content')

	<h1>Ingrese una nueva Comida</h1>
	@include ('errors.list')
	<hr/>

	{!! Form::open(['url' => 'comida']) !!}
		@include ('partials.form', ['submitButtonText' => 'Añadir Comida'])
	{!! Form::close() !!}

	

@stop


@section('scripts')            
<script>
var ingredientes = {!! $ingredientes !!};
var ingredientes_select_text = ingredientesOptions();
$(document).ready(function(){
 
    var wrapper_ingrediente         = $("#ingrediente_wrapper"); //Fields wrapper
    var add_button_ingrediente      = $("#add_ingrediente"); //Add button ID
    var ingredientes_cont = 1; //initlal text box count
    $(add_button_ingrediente).click(function(e){ //on add input button click
    e.preventDefault();
    ingredientes_cont++; //text box increment
    $(wrapper_ingrediente).append('<div class="row">'+
                                    '<p class="col m2">Ingrediente</p>'+
                                    '<select name="ingrediente_id['+ingredientes_cont+']" id="ingrediente_id['+ingredientes_cont+']">'+
                                  	ingredientes_select_text+
                                    '</select>'+
                                    '<p class="col m2">Cantidad:</p>'+
                                    '<input class="col m2" type="number"  name="cantidad['+ingredientes_cont+']" id="cantidad['+ingredientes_cont+']">'+
                                    '<a href="#" class="col m2 remove_field">Remove</a>'+
                                    '</div>');

    });
    
  	$(wrapper_ingrediente).on("click",".remove_field", function(e)
    { //user click on remove text
        e.preventDefault(); $(this).parent('div').remove();
        ingredientes_cont--;
    })
});


function ingredientesOptions()
{
	var options = '';

	for (var i = 0; i < ingredientes.length; i++) 
	{ 
    	options += '<option value="'+ingredientes[i].id+'">'+ingredientes[i].nombre+'</option>';
	}

  return options;
}
</script>
@stop