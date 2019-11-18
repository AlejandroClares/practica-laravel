@extends('layout.master')

@section('title', 'Laravel - Peliculas')

@section('main')
    <a href="{{route('movie.create')}}">Insertar nueva pelicula</a><br>
        @foreach ($datosPeliculas as $movie)
            <article class="movie">
                <div class="containerPortada">
                    <a href="{{ route('movie.show', $movie->id) }}">
                    <img class="portada" src="{{$movie->portada}}">
                    </a>
                </div>
                <div class="infoMovie">
                    <p>{{$movie->nombre}}</p>
                    <a href="{{ route('movie.destroy', $movie->id) }}" class="actionMovies">Ver</a>
                    <a href="{{ route('movie.edit', $movie->id) }}" class="actionMovies">Modificar</a>
                    <a class="actionMovies delete" id="{{ $movie->id }}" >Eliminar</a>
                </div>
            </article>
        @endforeach
@endsection