<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Usuarios extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = array('nick', 'passwd', 'nombre', 'apellidos', 'email'); 
}
