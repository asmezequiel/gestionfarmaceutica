<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Medicamento;
use App\User;
use App\Cliente;

use Illuminate\Support\Facades\Auth;

class DetalleMovimiento extends Model
{
	protected $table = 'detalle_movimientos';

    protected $fillable = [ 'id', 'num_movimiento' , 'medicamento_id' , 'cant', ];

    protected $hidden = [];

    public function medicamento(){
        return $this->belongsTo('App\Medicamento');
    }

    public function crear( $num_movimiento , $medicamento , $cant ){ 
        $this->num_movimiento = $num_movimiento;
        $this->medicamento()->associate( $medicamento );
        $this->cant =  $cant;
        $this->save();
    }
}
