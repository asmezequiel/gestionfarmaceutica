<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
	protected $table = 'perfiles';

    protected $fillable = [ 'user_id' , 'apellido', 'nombres' , 'dni' , 'direccion' , 'telefono' , 'celular' , 'email' ];

    protected $hidden = [];

    public function usuario(){
    	return $this->belongsTo('App\User');
    }
}
