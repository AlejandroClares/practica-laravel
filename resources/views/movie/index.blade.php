@extends('layout.master')

@section('title', 'Laravel - Peliculas')

@section('main')
    <a href="{{route('movie.create')}}">Insertar nueva pelicula</a><br>
    <!-- <table border="1px">
        <thead>
            <th>Portada</th>
            <th>Nombre</th>
            <th>Duracion</th>
            <th>Año</th>
            <th colspan="2">Acciones</th>
        </thead>
        <tbody>
            @foreach ($datosPeliculas as $movie)
            <tr>
                <td>{{$movie->portada}}</td>
                <td>{{$movie->nombre}}</td>
                <td>{{$movie->duracion}}</td>
                <td>{{$movie->anyo}}</td>
                <td><a href="{{ route('movie.edit', $movie->id) }}">Modificar</a></td>
                <td><a href="{{ route('movie.destroy', $movie->id) }}">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table> -->
        @foreach ($datosPeliculas as $movie)
            <article class="movie">
                <div class="containerPortada">
                    <img class="portada" src="{{$movie->portada}}">
                </div>
                <div class="infoMovie">
                    <p>{{$movie->nombre}}</p>
                    <a href="{{ route('movie.edit', $movie->id) }}" class="actionMovies">Modificar</a>
                    <a href="{{ route('movie.destroy', $movie->id) }}" class="actionMovies">Ver</a>
                </div>
            </article>
        @endforeach
@endsection