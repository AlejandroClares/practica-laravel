<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generos extends Model
{
    protected $table = 'generos';
    protected $primaryKey = 'id';
    protected $fillable = array('nombre'); 

    public function peliculas(){
        return $this->belongsToMany('App\Peliculas');
    }
}
