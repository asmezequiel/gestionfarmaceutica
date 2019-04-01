<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
	protected $table = 'perfiles';

    protected $fillable = [ 'apellido', 'nombres' , 'dni' , 'direccion' , 'telefono' , 'celular' , 'email' ];

    protected $hidden = [ 'user_id' , 'created_at' , 'updated_at' ];

    public function usuario(){
    	return $this->belongsTo('App\User');
    }
}
