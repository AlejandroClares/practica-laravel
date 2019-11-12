<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenerosPeliculas extends Model
{
    protected $table = 'generos_peliculas';
    protected $primaryKey = 'peliculas_id';
    protected $fillable = array('generos_id'); 
}
