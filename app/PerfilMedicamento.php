<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilMedicamento extends Model
{
    protected $table = 'perfil_medicamentos';

    protected $fillable = [ 'id' , 'nombre' , 'descripcion' , 'clasificacion'];

    protected $hidden 	= [ 'created_at' , 'updated_at'];

    public function medicamentos(){
    	return $this->hasMany('App\Medicamento');
    }
}
