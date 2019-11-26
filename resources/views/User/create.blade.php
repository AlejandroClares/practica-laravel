@extends('layout.master')

@section('title', "Laravel - Crear usuario")

@section('main')
    <form action="{{route('user.store')}}" method="post">
        @csrf 
        Nombre<br>
        <input type="text" name="name"><br>
        Email<br>
        <input type="email" name="email"><br>
        Contraseña<br>
        <input type="password" name="password"><br>
        <input type="submit" value="Guardar">
    </form>
@endsection