<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'id';
    protected $fillable = array('nombre');

    public function directores(){
        return $this->belongsToMany('App\Personas', 'personas_directores');
    }

    public function actores(){
        return $this->belongsToMany('App\Personas', 'personas_actores');
    }
}
