<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';

    protected $fillable = [ 'empresa' , 'cant' , 'lote' , 'fecha_vencimiento'];

    protected $hidden = [ 'id' , 'medicamento_id' , 'created_at' , 'updated_at' ];

    public function medicamento(){
        return $this->belongsTo('App\Medicamento');
    }

    public function bajaStock( $cant ){
        $this->cant -= $cant;
        return $this->save();
    }

    public function altaStock( $cant ){
    	$this->cant += $cant;
    	return $this->save();
    }
}
