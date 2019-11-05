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

    public function show($id){
        $data['datosUsuario'] = Usuarios::find($id);
        return view('User/show', $data);
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
        return redirect()->route('user.index');
    }

    public function edit($id){
        $user = new Usuarios();
        $data["datosUsuario"] = $user->find($id); 
        return view('User/edit', $data);
    }

    public function update($id, Request $r){
        $user = Usuarios::find($id);
        $user->nombre = $r->nombre;
        $user->apellidos = $r->apellidos;
        $user->email = $r->email;
        $user->nick = $r->nick;
        $user->passwd = $r->password;
        $user->tipo = $r->tipo;
        $user->save();
        return redirect()->route('user.index');
    }

    public function destroy($id){
        echo "Hola!";
        Usuarios::destroy($id);
        return redirect()->route('user.index');
    }
}
