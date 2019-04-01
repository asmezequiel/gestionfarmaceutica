<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = [ 'descripcion' ];
    
    protected $hidden = [ 'id' , 'created_at' , 'updated_at' ];

    public function usuarios(){
    	 return $this->belongsToMany('App\User');
    }
}
