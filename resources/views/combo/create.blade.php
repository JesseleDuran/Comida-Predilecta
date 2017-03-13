@extends('app')

@section('contenido')

	<h1 style="text-align:center">Ingrese un nuevo Combo</h1>
	@include ('errors.list')
	<hr/>

	{!! Form::open(['url' => 'combo']) !!}
		@include ('partials.form', ['submitButtonText' => 'Añadir Combo'])
	{!! Form::close() !!}



@stop


@section('scripts')            
<script>
var comidas = {!! $comidas !!};
var comidas_select_text = comidasOptions();
$(document).ready(function(){
 
    var wrapper_comida         = $("#comida_wrapper"); //Fields wrapper
    var add_button_comida      = $("#add_comida"); //Add button ID
    var comidas_cont = 1; //initlal text box count
    $(add_button_comida).click(function(e){ //on add input button click
    e.preventDefault();
    comidas_cont++; //text box increment
    $(wrapper_comida).append('<div class="row">'+
                                    '<p class="col m2">comida</p>'+
                                    '<select name="comida_id['+comidas_cont+']" id="comida_id['+comidas_cont+']">'+
                                  	comidas_select_text+
                                    '</select>'+
                                    '<p class="col m2">Cantidad:</p>'+
                                    '<input class="col m2" type="number"  name="cantidad['+comidas_cont+']" id="cantidad['+comidas_cont+']">'+
                                    '<a href="#" class="col m2 remove_field">Remove</a>'+
                                    '</div>');

    });
    
  	$(wrapper_comida).on("click",".remove_field", function(e)
    { //user click on remove text
        e.preventDefault(); $(this).parent('div').remove();
        comidas_cont--;
    })
});


function comidasOptions()
{
	var options = '';

	for (var i = 0; i < comidas.length; i++) 
	{ 
    	options += '<option value="'+comidas[i].id+'">'+comidas[i].nombre+'</option>';
	}

  return options;
}
</script>
@stop