@extends('layout.master')
@section('title', "Laravel - Editar usuario")

@section('main')
    <form action="{{ route('user.update', $datosUsuario->id) }}" method="post">
        @csrf
        @method('PATCH')
        Nombre:<br>
        <input type="text" name="name" value="{{$datosUsuario->name}}"><br>
        Email:<br>
        <input type="email" name="email" value="{{$datosUsuario->email}}"><br>
        Contraseña:<br>
        <input type="text" name="password" value=""><br>
        <input type="submit" value="Modificar">
    </form>
@endsection