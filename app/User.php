<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
     //protected $table = "user";
    protected $primaryKey = 'cedula';
    public $incrementing = false;

    protected $attributes = array(
        'admin' => 'false'
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'password', 'telefono', 'direccion', 'cedula', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //Un usuario puede tener muchas ventas
    public function ventas()
    {
        return $this->hasMany('App/Venta');
    }

    public function setnombreAttribute($value){
        $this->attributes['nombre'] = ucfirst(strtoLower($value));
    }

    public function isAdmin()
    {
        return $this->admin; // this looks for an admin column in your users table
    }

 
}
