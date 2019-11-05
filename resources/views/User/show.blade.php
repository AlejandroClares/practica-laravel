@extends('layout.master')

@section('title', "Laravel - Ver usuario")

@section('main')
    <h3>Datos de usuario</h3>

    <form action="{{ route('user.destroy', $datosUsuario->id) }}" method="post">
        @csrf
        @method('DELETE')
        Nombre:<br>
        <input type="text" value="{{ $datosUsuario->nombre }}" disabled><br>
        Apellidos:<br>
        <input type="text" value="{{ $datosUsuario->apellidos }}" disabled><br>
        Correo electrónico:<br>
        <input type="text" value="{{ $datosUsuario->email }}" disabled><br>
        Usuario:<br>
        <input type="text" value="{{ $datosUsuario->nick }}" disabled><br>
        Contraseña:<br>
        <input type="text" value="{{ $datosUsuario->passwd }}" disabled><br>
        Tipo:<br> 
        <input type="text" value="{{ $datosUsuario->tipo }}" disabled><br>
        <br>
        <input type="submit" value="Eliminar usuario">
    </form>
@endsection