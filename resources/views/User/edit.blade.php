@extends('layout.master')
@section('title', "Laravel - Editar usuario")

@section('main')
    <form action="{{route('user.update', $idUsuario')}}" method="post">
        <input type="hidden" name="_method" value="patch">
        <input type="text" name="nick" value="{{$datosUsuario->nick}}">
        <input type="text" name="password" value="{{$datosUsuario->passwd}}">
        <input type="text" name="nombre" value="{{$datosUsuario->nombre}}">
        <input type="text" name="apellidos" value="{{$datosUsuario->apellidos}}">
        <input type="text" name="email" value="{{$datosUsuario->email}}">
        <input type="text" name="tipo" value="{{$datosUsuario->tipo}}">
        <input type="submit" value="Modificar">
    </form>
@endsection