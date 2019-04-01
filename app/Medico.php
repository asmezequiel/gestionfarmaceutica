<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';

    protected $fillable = [ 'apellido', 'nombres' , 'dni' , 'direccion' , 'telefono' , 'celular' , 'num_matricula' ];

    protected $hidden = ['user_id'];
}
