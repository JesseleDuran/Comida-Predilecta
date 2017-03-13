<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "venta";

    protected $fillable = [
    	'fecha','subtotal','iva','total','forma_pago','llevar','numero_mesa','id_cliente','ci_user'			
    ];

    //Una venta le pertenece a un usuario
    public function user()
    {
        return $this->belongsTo('App/User', 'cedula', 'ci_user');
    }

    //Una venta le pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo('App/Cliente', 'cedula', 'ci_cliente');
    }

    //Una venta puede realizarce en una mesa
    public function mesa()
    {
        return $this->belongsTo('App/Mesa', 'numero', 'numero_mesa');
    }

    //Una venta puede tener muchas comidas
    public function comidaVenta()
    {
        return $this->hasMany('App\Comida_Venta','id_venta');
    }

    
}
