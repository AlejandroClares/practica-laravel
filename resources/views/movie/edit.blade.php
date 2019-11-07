@extends('layout.master')
@section('title', "Laravel - Editar pelicula")

@section('main')
    <form action="{{ route('movie.update', $datosPelicula->id) }}" method="post">
        @csrf
        @method('PATCH')
        Portada:<br>
        <input type="text" name="portada" value="{{$datosPelicula->portada}}"><br>
        Nombre:<br>
        <input type="text" name="nombre" value="{{$datosPelicula->nombre}}"><br>
        Duracion:<br>
        <input type="text" name="duracion" value="{{$datosPelicula->duracion}}"><br>
        Año:<br>
        <input type="text" name="anyo" value="{{$datosPelicula->anyo}}"><br>
        Genero:<br>
        <input type="text" name="genero" value="{{$datosPelicula->genero}}"><br>
        <input type="submit" value="Modificar">
    </form>
@endsection