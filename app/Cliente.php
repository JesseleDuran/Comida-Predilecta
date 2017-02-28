<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";

    protected $fillable = [
    	'nombre',
    	'cedula'				
    ];

    //Un cliente puede tener muchas ventas
    public function ventas()
    {
        return $this->hasMany('App/Venta');
    }
}
