<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';

    protected $fillable = [ 'empresa' , 'cant' , 'lote' , 'fecha_vencimiento' , 'id' , 'medicamento_id' ];

    protected $hidden = [ 'created_at' , 'updated_at' ];

    public function medicamento(){
        return $this->belongsTo('App\Medicamento' , 'medicamento_id');
    }

    public function bajaStock( $cant ){
        $this->cant -= $cant;
        return $this->save();
    }

    public function altaStock( $cant ){
    	$this->cant += $cant;
    	return $this->save();
    }

    public function crear( $empresa , $cant , $lote , $fecha_vencimiento , $medicamento ){
        $this->empresa  = $empresa;;
        $this->lote     = $lote;
        $this->fecha_vencimiento = $fecha_vencimiento;
        $this->medicamento()->associate( $medicamento );
        $this->save();

        $this->altaStock( $cant );
        return $this;
    }
}
