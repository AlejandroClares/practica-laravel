@extends('layout.master')

@section('title', "Laravel - Crear pelicula")

@section('main')
    <article>
        <div class="createContainerMovie">
            <form action="{{route('movie.store')}}" method="post">
                @csrf 
                <label for="portada">Portada</label>
                <input type="text" id="portada" name="portada"><br>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre"><br>
                <div class="createNumberMovie">
                    <label for="duracion">Duración</label>
                    <input type="number" id="duracion" name="duracion"><br>
                </div>
                <div class="createNumberMovie">
                    <label for="anyo">Año</label>
                    <input type="number" id="anyo" name="anyo"><br>
                </div>
                <label for="genero">Género</label>
                <select id="genero" name="generos[]" size="2 " multiple>
                    @foreach ($datosGeneros as $genero)
                    <option value="{{$genero->id}}">{{$genero->nombre}}</option>        
                    @endforeach
                </select><br>
                <input class="createSubmitMovie" type="submit" value="Guardar">
            </form>
        </div>
    </article>
@endsection