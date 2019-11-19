@extends('layout.master')

@section('title', 'Laravel - Peliculas')

@section('main')
    <a href="{{route('movie.create')}}">Insertar nueva pelicula</a><br>
    
        @foreach ($datosPeliculas as $movie)
            <article class="movie" id="{{ $movie->id }}">
                <div class="containerPortada">
                    <a href="{{ route('movie.show', $movie->id) }}">
                    <img class="portada" src="{{$movie->portada}}">
                    </a>
                </div>
                <div class="infoMovie">
                    <p>{{$movie->nombre}}</p>
                    <a href="{{ route('movie.edit', $movie->id) }}" class="actionMovies">Modificar</a>
                    <a class="actionMovies delete" name="{{ $movie->id }}" >Eliminar</a>
                    <!-- <button name="{{ $movie->id }}">Eliminar</button> -->
                </div>
            </article>
        @endforeach
@endsection