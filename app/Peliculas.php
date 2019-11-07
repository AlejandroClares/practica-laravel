<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    protected $table = 'peliculas';
    protected $primaryKey = 'id';
    protected $fillable = array('id', 'portada', 'nombre', 'duracion', 'anyo', 'genero'); 
}
