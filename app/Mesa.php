<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = "mesa";

    protected $fillable = [
    	'estado'		
    ];

    //Una mesa puede tener muchas ventas
    public function ventas()
    {
        return $this->hasMany('App/Venta');
    }
}
