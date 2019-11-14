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
                {{-- Muestra los generos que tiene esta pelicula seleccionados --}}
                {{ $genderMovie = false }}
                @foreach ($generosPelicula as $generoPelicula)    
                    @if ($genero->id == $generoPelicula->id)
                        <option value="{{$genero->id}}" selected="selected">{{$genero->nombre}}</option>
                        {{ $genderMovie = true }}
                        @break
                    @endif
                @endforeach
                {{-- Si no tiene el genero, lo muestra sin seleccionar --}}
                @if (!$genderMovie)
                    <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                @endif    
            @endforeach
        </select><br>
        Año:<br>
        <input type="text" name="anyo" value="{{$datosPelicula->anyo}}"><br>
        <input type="submit" value="Modificar">
    </form>
@endsection