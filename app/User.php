<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [ 'name', 'email', 'rol' ];

    protected $hidden = [ 'password', 'activo' , 'remember_token', ];

    protected $casts = [ 'email_verified_at' => 'datetime', ];

    public function rol(){
        return $this->belongsTo('App\Rol');
    }

    public function perfil(){
        return $this->hasOne('App\Perfil');
    }

    public function movimientos(){
        /*if ($this->rol->descripcion == 'cliente') {
            return false;
        }*/
        //return $this->belongsToMany('App\Movimiento' , 'movimiento_user' , 'user_id' , 'num_movimiento' )->withTimestamps();
        return $this->hasMany('App\MovimientoUsuario');
    }
}
