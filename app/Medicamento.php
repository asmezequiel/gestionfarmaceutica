<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = 'medicamentos';

    protected $fillable = [ 'codigo' , 'descripcion' , 'cant_blister' ];

    protected $hidden = [ 'id' , 'perfil_medicamento_id' , 'created_at' , 'updated_at' , 'status' ];

    public function perfil(){
        return $this->belongsTo('App\PerfilMedicamento' , 'perfil_medicamento_id');
    }

    public function stock(){
        return $this->hasOne('App\Stock');
    }

    public function crear( $perfil_medicamento , $descripcion , $codigo , $cant_blister ){
        $this->perfil()->associate( $perfil_medicamento );
        $this->descripcion      = $descripcion;
        $this->codigo       = $codigo;
        $this->cant_blister = $cant_blister;

        return $this->save();
    }

    public function deshabilitar(){
        $this->status = false;
    }

    public function actualizarDatos( $perfil_medicamento , $descripcion , $codigo , $cant_blister ){
        $this->perfil()->associate( $perfil_medicamento );
        $this->descripcion      = $descripcion;
        $this->codigo           = $codigo;
        $this->cant_blister     = $cant_blister;
    	return $this->save();
    }

}
