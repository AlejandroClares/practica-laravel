@extends('layout.master')

@section('title', "Laravel - Crear usuario")

@section('main')
    <form action="{{route('user.store')}}" method="post">
        @csrf 
        Nick<br> 
        <input type="text" name="nick"><br>
        Contraseña<br>
        <input type="password" name="password"><br>
        Nombre<br>
        <input type="text" name="nombre"><br>
        Apellidos<br>
        <input type="text" name="apellidos"><br>
        Email<br>
        <input type="text" name="email"><br>
        Tipo<br>
        <input type="text" name="tipo"><br>
        <input type="submit" value="Guardar">
    </form>
@endsection