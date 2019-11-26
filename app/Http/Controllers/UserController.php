<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class UserController extends Controller
{
    
    public function index(){
        $data['listaUsuarios'] = User::all();
        return view('user/index', $data);
    }

    public function show($id){
        $data['datosUsuario'] = User::find($id);
        return view('user/show', $data);
    }

    public function create(){
        return view('user/create');
    }

    public function store(Request $r){
        $user = new User($r->all());
        $user->password = Hash::make($r->password);
        $user->save();
        return redirect()->route('user.index');
    }

    public function edit($id){
        $data["datosUsuario"] = User::find($id); 
        return view('user/edit', $data);
    }

    public function update($id, Request $r){
        $user = User::find($id);
        $user->fill($r->all());
        $user->password = Hash::make($r->password);
        $user->save();
        return redirect()->route('user.index');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route('user.index');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('movie.index')
    }
}
