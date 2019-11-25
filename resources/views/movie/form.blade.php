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
                {{-- Lista de generos --}}
                <label for="genero">Género</label>
                <select id="genero" name="generos[]" size="4" multiple>
                    @foreach ($datosGeneros as $genero)
                        {{-- Muestra los generos que tiene esta pelicula seleccionados --}}
                        {{ $estaEnLista = false }}
                        @isset($generosPelicula)
                            @foreach ($generosPelicula as $generoPelicula)
                                    @if ($genero->id == $generoPelicula->id)
                                        <option value="{{$genero->id}}" selected="selected">{{$genero->nombre}}</option>
                                        {{ $estaEnLista = true }}
                                        @break
                                    @endif
                            @endforeach
                        @endisset
                        {{-- Si no tiene el genero, lo muestra sin seleccionar --}}
                        @if (!$estaEnLista)
                            <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                        @endif    
                    @endforeach
                </select><br>

                {{-- Lista de directores --}}
                <label for="director">Director</label>
                <select id="director" name="directores[]" size="4 " multiple>
                    @foreach ($datosPersonas as $director)
                        {{-- Muestra los directores que tiene esta pelicula seleccionados --}}
                        {{ $estaEnLista = false }}
                        @isset($directoresPelicula)
                            @foreach ($directoresPelicula as $existeDirector)
                                    @if ($director->id == $existeDirector->id)
                                        <option value="{{$director->id}}" selected="selected">{{$director->nombre}}</option>
                                        {{ $estaEnLista = true }}
                                        @break
                                    @endif
                            @endforeach
                        @endisset
                        {{-- Si no tiene el director, lo muestra sin seleccionar --}}
                        @if (!$estaEnLista)
                            <option value="{{$director->id}}">{{$director->nombre}}</option>
                        @endif    
                    @endforeach
                </select><br>
                
                {{-- Lista de actores --}}
                <label for="actores">Actores</label>
                <select id="actores" name="actores[]" size="4" multiple>
                    @foreach ($datosPersonas as $actor)
                        {{-- Muestra los actores que tiene esta pelicula seleccionados --}}
                        {{ $estaEnLista = false }}
                        @isset($actoresPelicula)
                            @foreach ($actoresPelicula as $existeActor)
                                    @if ($actor->id == $existeActor->id)
                                        <option value="{{$actor->id}}" selected="selected">{{$actor->nombre}}</option>
                                        {{ $estaEnLista = true }}
                                        @break
                                    @endif
                            @endforeach
                        @endisset
                        {{-- Si no tiene el actor, lo muestra sin seleccionar --}}
                        @if (!$estaEnLista)
                            <option value="{{$actor->id}}">{{$actor->nombre}}</option>
                        @endif    
                    @endforeach
                </select><br>
                <input class="formSubmitMovie" type="submit" value="Guardar">
            </form>
        </div>
    </article>
@endsection