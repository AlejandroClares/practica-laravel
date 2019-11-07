@extends('layout.master')

@section('title', "Laravel - Ver pelicula")

@section('main')
    <h3>Datos de usuario</h3>

    <form action="{{ route('movie.destroy', $datosPelicula->id) }}" method="post">
        @csrf
        @method('DELETE')
        Portada:<br>
        <input type="text" value="{{ $datosPelicula->portada }}" disabled><br>
        Nombre:<br>
        <input type="text" value="{{ $datosPelicula->nombre }}" disabled><br>
        Duracion:<br>
        <input type="text" value="{{ $datosPelicula->duracion }}" disabled><br>
        Año:<br>
        <input type="text" value="{{ $datosPelicula->anyo }}" disabled><br>
        Genero:<br>
        <input type="text" value="{{ $datosPelicula->genero }}" disabled><br>
        <br>
        <input type="submit" value="Eliminar usuario">
    </form>
@endsection