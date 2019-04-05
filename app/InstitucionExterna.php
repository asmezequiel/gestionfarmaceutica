<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitucionExterna extends Model
{
    
    protected $table 	= 'instituciones_externas';
    protected $fillable = ['id' , 'nombre'];
}
