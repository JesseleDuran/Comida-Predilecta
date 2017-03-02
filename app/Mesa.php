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

    public validar_mesa($numero, $error_mesa){
        if($numero <1 || $numero > 10){
            $error_mesa = "Mesa no existe";
            return false;
        }
        
        $error_mesa="";
        return true;
    }
}
