<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    protected $table = "comida";

    protected $fillable = [
    	'nombre','precio','descripcion'				
    ];

    //una comida tiene muchas comidas
    public function comidaComida()
    {
    	return $this->hasMany('App\Comida_Comida','id_comida');
  	}

  	//una comida tiene muchas ventas
  	public function comidaVenta()
    {
    	return $this->hasMany('App\Comida_Venta','id_comida');
  	}

  	//una comida tiene muchos ingredientes
  	public function comidaIngredientes()
    {
    	return $this->hasMany('App\Comida_Ingrediente','id_comida');
  	}
}
