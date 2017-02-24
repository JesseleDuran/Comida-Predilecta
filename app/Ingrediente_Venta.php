<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente_Venta extends Model
{
    protected $table = "ingrediente_venta";

    protected $fillable = [
    	'cantidad'			
    ];

    public function ingrediente()
    {
    	return $this->belongsTo('App\Ingrediente','id_ingrediente');
  	}

  	public function venta()
    {
    	return $this->belongsTo('App\Venta','id_venta');
  	}
}
