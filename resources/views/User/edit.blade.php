@extends('layout.master')
@section('title', "Laravel - Editar usuario")

@section('main')
    <form action="{{ route('user.update', $datosUsuario->id) }}" method="post">
        @csrf
        @method('PATCH')
        Nick:<br>
        <input type="text" name="nick" value="{{$datosUsuario->nick}}"><br>
        Contraseña:<br>
        <input type="text" name="passwd" value="{{$datosUsuario->passwd}}"><br>
        Nombre:<br>
        <input type="text" name="nombre" value="{{$datosUsuario->nombre}}"><br>
        Apellidos:<br>
        <input type="text" name="apellidos" value="{{$datosUsuario->apellidos}}"><br>
        Email:<br>
        <input type="text" name="email" value="{{$datosUsuario->email}}"><br>
        <input type="submit" value="Modificar">
    </form>
@endsection