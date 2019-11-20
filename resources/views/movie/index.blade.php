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
                    <div class="containerTitle">
                        <a href="{{ route('movie.show', $movie->id) }}" class="linkTitle">{{ $movie->nombre }}</a>
                    </div>
                    <a href="{{ route('movie.edit', $movie->id) }}" class="actionMovies">Modificar</a>
                    <a id="{{ $movie->id }}" class="actionMovies delete" >Eliminar</a>
                </div>
            </article>
        @endforeach
@endsection