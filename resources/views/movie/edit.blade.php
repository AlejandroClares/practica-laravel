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

        Genero:<br>
        <select name="generos[]" multiple>
            @foreach ($datosGeneros as $genero)
            <option value="{{$genero->id}}">{{$genero->nombre}}</option>        
            @endforeach
        </select><br>
        Año:<br>
        <input type="text" name="anyo" value="{{$datosPelicula->anyo}}"><br>
        <input type="submit" value="Modificar">
    </form>
@endsection