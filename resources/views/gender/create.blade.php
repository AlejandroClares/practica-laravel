@extends('layout.master')

@section('title', "Laravel - Crear genero")

@section('main')
    <form action="{{route('gender.store')}}" method="post">
        @csrf 
        Nombre:<br> 
        <input type="text" name="nombre"><br>
        <input type="submit" value="Guardar">
    </form>
@endsection