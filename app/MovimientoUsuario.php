<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoUsuario extends Model
{
    protected $table = 'movimiento_user';

    protected $primaryKey = 'num_movimiento';
    protected $fillable = [     'user_id' , 'medico_id' , 'cliente_id' , 'tipo_movimiento' ,
                                'detalle_tipo_movimiento' , 'empresa' , 'num_remito'];
    protected $hidden   = [];




    public function detalle(){
    	return $this->hasMany('App\DetalleMovimiento' , 'num_movimiento' , 'num_movimiento');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    public function medico(){
        return $this->belongsTo('App\Medico');
    }

    public function usuario(){
    	return $this->belongsTo('App\User' , 'user_id');
    }

    public function getNumeroMovimiento(){
        return $this->num_movimiento;
    }
}
