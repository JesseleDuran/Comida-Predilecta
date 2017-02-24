<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = "mesa";

    protected $fillable = [
    	'nombre','precio','descripcion'				
    ];
}
