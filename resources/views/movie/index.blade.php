@extends('layout.master')

@section('title', 'Laravel - Peliculas')

@section('main')
    @auth
    <a href="{{route('movie.create')}}">Insertar nueva pelicula</a><br>    
    @endauth

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
                    @auth
                        <a href="{{ route('movie.edit', $movie->id) }}" class="actionMovies">Modificar</a>
                        <a id="{{ $movie->id }}" class="actionMovies delete" >Eliminar</a>    
                    @endauth
                    
                </div>
            </article>
        @endforeach
        @auth
                <script
                src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>
            <script>
                $(function() {
                    $(".delete").click(function(){
                    var isDelte = confirm("¿Esta seguro que desea eliminar la pelicula?");
                    if(isDelte){
                        var domElement = $(this);
                        var id = $(this).attr("id");
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){ 
                                if (xhttp.responseText == 1) {
                                    $(domElement).parent().parent().remove();
                                } else {
                                    alert("Algo fallo!");
                                }
                            }
                        }
                        var direccion = "http://localhost:3000/movie/delete/"+id;
                        xhttp.open("GET", direccion, true);
                        xhttp.send();
                    }
                    });
                });
            </script>    
        @endauth
        
@endsection