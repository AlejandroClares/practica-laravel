<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    public $timestamps = false;
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = array('id', 'nombre', 'apellidos', 'email', 'nick', 'passwd', 'tipo'); 
}
