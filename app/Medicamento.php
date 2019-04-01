<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = 'medicamentos';

    protected $fillable = [ 'id' , 'codigo' , 'cant_blister' ];

    protected $hidden = [ 'perfil_medicamento_id' , 'created_at' , 'updated_at' , 'status' ];

    public function perfil(){
        return $this->belongsTo('App\PerfilMedicamento' , 'perfil_medicamento_id');
    }

    public function stock(){
        return $this->hasOne('App\Stock');
    }

    public function crear( $perfil_medicamento , $codigo , $cant_blister ){
        $this->perfil()->associate( $perfil_medicamento );
        $this->codigo       = $codigo;
        $this->cant_blister = $cant_blister;

        return $this->save();
    }

    public function deshabilitar(){
        $this->status = false;
    }

    public function actualizarDatos( $perfil_medicamento , $codigo , $cant_blister ){
        $this->perfil()->associate( $perfil_medicamento );
        $this->codigo           = $codigo;
        $this->cant_blister     = $cant_blister;
    	return $this->save();
    }

}
