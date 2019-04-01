<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [ 'id' , 'apellido' , 'nombres' , 'dni' , 'direccion' , 'telefono' , 'celular' , 'email' ];

}
