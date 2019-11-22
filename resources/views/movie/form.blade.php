@extends('layout.master')
@section('title', "Laravel - Editar pelicula")

@section('main')
    <article>
        <div class="formContainerMovie">
            {{-- Selecciona la cabecera del formulario, dependiendo si es para modificar o anadir --}}
            @isset($datosPelicula)
                <form action="{{ route('movie.update', $datosPelicula->id) }}" method="post">    
                @method('PATCH')
            @else
                <form action="{{ route('movie.store') }}" method="post">
            @endisset

            {{-- Muestra los errores de validacion --}}
            @if ($errors->any())
                <div class="showFormErrors">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
                </div>
            @endif
                
                {{-- Todos los campos seran rellenados si se encuentran datos de una pelicula --}}
                @csrf
                <label for="portada">Portada</label>
                <input type="text" id="portada" name="portada" value="{{$datosPelicula->portada ?? ''}}"><br>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{$datosPelicula->nombre ?? ''}}"><br>
                <div class="formNumberMovie">
                    <label for="duracion">Duración</label>
                    <input type="number" id="duracion" name="duracion" value="{{$datosPelicula->duracion ?? ''}}"><br>
                </div>
                <div class="formNumberMovie">
                    <label for="anyo">Año</label>
                    <input type="number" id="anyo" name="anyo" value="{{$datosPelicula->anyo ?? ''}}"><br>
                </div>
                <label for="genero">Género</label>
                <select id="genero" name="generos[]" size="2 " multiple>
                    @foreach ($datosGeneros as $genero)
                        {{-- Muestra los generos que tiene esta pelicula seleccionados --}}
                        {{ $genderMovie = false }}
                        @isset($generosPelicula)
                            @foreach ($generosPelicula as $generoPelicula)
                                    @if ($genero->id == $generoPelicula->id)
                                        <option value="{{$genero->id}}" selected="selected">{{$genero->nombre}}</option>
                                        {{ $genderMovie = true }}
                                        @break
                                    @endif
                            @endforeach
                        @endisset
                        {{-- Si no tiene el genero, lo muestra sin seleccionar --}}
                        @if (!$genderMovie)
                            <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                        @endif    
                    @endforeach
                </select><br>
                <input class="formSubmitMovie" type="submit" value="Guardar">
            </form>
        </div>
    </article>
@endsection