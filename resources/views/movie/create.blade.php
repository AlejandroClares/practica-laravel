@extends('layout.master')

@section('title', "Laravel - Crear pelicula")

@section('main')
    <form action="{{route('movie.store')}}" method="post">
        @csrf 
        Portada<br> 
        <input type="text" name="portada"><br>
        Nombre<br> 
        <input type="text" name="nombre"><br>
        Duracion<br> 
        <input type="number" name="duracion"><br>
        Genero:<br>
        <select name="generos[]" multiple>
            @foreach ($datosGeneros as $genero)
            <option value="{{$genero->id}}">{{$genero->nombre}}</option>        
            @endforeach
        </select><br>
        Año<br> 
        <input type="number" name="anyo"><br>
        <input type="submit" value="Guardar">
    </form>
@endsection