@extends('layout.master')

@section('title', "Laravel - Ver usuario")

@section('main')
    <h3>Datos de usuario</h3>

    <form action="{{ route('user.destroy', $datosUsuario->id) }}" method="post">
        @csrf
        @method('DELETE')
        Nombre:<br>
        <input type="text" value="{{ $datosUsuario->name }}" disabled><br>
        Correo electrónico:<br>
        <input type="text" value="{{ $datosUsuario->email }}" disabled><br>
        Contraseña:<br>
        <input type="text" value="{{ $datosUsuario->password }}" disabled><br>
        <br>
        <input type="submit" value="Eliminar usuario">
    </form>
@endsection