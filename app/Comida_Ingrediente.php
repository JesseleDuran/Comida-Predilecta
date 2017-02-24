<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comida_Ingrediente extends Model
{
    protected $table = "comida_ingrediente";

    protected $fillable = [
    	'cantidad'				
    ];

    public function comida()
    {
    	return $this->belongsTo('App\Comida','id_comida');
  	}

  	public function ingrediente()
    {
    	return $this->belongsTo('App\Ingrediente','id_ingrediente');
  	}
}
