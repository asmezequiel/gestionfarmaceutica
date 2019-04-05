<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilMedicamento extends Model
{
    protected $table = 'perfil_medicamentos';

    protected $fillable = [ 'id' , 'nombre' , 'clasificacion'];

    protected $hidden 	= [ 'created_at' , 'updated_at' , 'status' ];

    public function medicamentos(){
    	return $this->hasMany('App\Medicamento');
    }

    public function crear( $nombre , $clasificacion ){
    	$this->nombre 			= $nombre;
    	$this->clasificacion	= $clasificacion;
    	$this->save();
    	return $this;
    }
}
