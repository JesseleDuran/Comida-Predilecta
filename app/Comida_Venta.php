<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comida_Venta extends Model
{
    protected $table = "comida_venta";

    protected $fillable = [
    	'cantidad', 'id_venta', 'id_comida'			
    ];

    public function comida()
    {
    	return $this->belongsTo('App\Comida','id_comida');
  	}

  	public function venta()
    {
    	return $this->belongsTo('App\Venta','id_venta');
  	}
}
