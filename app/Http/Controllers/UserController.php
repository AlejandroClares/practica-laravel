<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;

class UserController extends Controller
{
    
    public function index(){
        $user = new Usuarios();
        $data['listaUsuarios'] = $user->all();
        return view('User/index', $data);
    }

    public function show(){

    }

    public function create(){
        return view('User/create');
    }

    public function store(Request $r){
        $user = new Usuarios();
        $user->nombre = $r->nombre;
        $user->apellidos = $r->apellidos;
        $user->email = $r->email;
        $user->nick = $r->nick;
        $user->passwd = $r->password;
        $user->tipo = $r->tipo;
        $user->save();
        return view('User/index');
    }

    public function edit($id){
        $user = new Usuarios();
        $data["datosUsuario"] = $user->find($id); 
        $data["idUsuario"] = $id;
        return view('User/edit');
    }

    public function update(){

    }

    public function destroy(){

    }
}
