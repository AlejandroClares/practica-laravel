<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;

class UserController extends Controller
{
    
    public function index(){
        $data['listaUsuarios'] = Usuarios::all();
        return view('user/index', $data);
    }

    public function show($id){
        $data['datosUsuario'] = Usuarios::find($id);
        return view('user/show', $data);
    }

    public function create(){
        return view('user/create');
    }

    public function store(Request $r){
        $user = new Usuarios($r->all());
        $user->save();
        return redirect()->route('user.index');
    }

    public function edit($id){
        $data["datosUsuario"] = Usuarios::find($id); 
        return view('user/edit', $data);
    }

    public function update($id, Request $r){
        $user = Usuarios::find($id);
        $user->fill($r->all());
        $user->save();
        return redirect()->route('user.index');
    }

    public function destroy($id){
        Usuarios::destroy($id);
        return redirect()->route('user.index');
    }
}
