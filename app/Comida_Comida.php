<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comida_Comida extends Model
{
    protected $table = "comida_comida";

    protected $fillable = [
    	'cantidad'				
    ];

    public function comida(){
    return $this->belongsTo('App\Comida','id_comida');
  	}

  	public function combo(){
    return $this->belongsTo('App\Comida','id_comida1');
  	}
}
