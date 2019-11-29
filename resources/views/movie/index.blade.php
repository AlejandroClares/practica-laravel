@extends('layout.master')

@section('title', 'Laravel - Peliculas')

@section('main')
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

    <input type="text" id="busqueda" name="busqueda" placeholder="Buscar pelicula...">
    <button name="buscarPelicula" onclick="buscarPelicula()">Buscar</button>
    <script>
        // Busca las peliculas y las agrega en la caja de peliculas
        function buscarPelicula(){
            var criterio = $('#busqueda').val();
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){ 
                    var dom_containerMovies = $(".containerMovies");
                    $(dom_containerMovies).empty();
                    if(xhttp.responseText == 0){
                        $(dom_containerMovies).append("<h2>No se encontraron resultados</h2>");
                    } else {
                        $(dom_containerMovies).append(xhttp.responseText);
                    }
                    
                    
                }
            }
            var direccion = "http://localhost:3000/movie/search/"+criterio;
            xhttp.open("GET", direccion, true);
            xhttp.send();
        }
    </script>

    @auth
    <a href="{{route('movie.create')}}">Insertar nueva pelicula</a><br>    
    @endauth
        <div class="containerMovies">
        @foreach ($datosPeliculas as $movie)
            <article class="movie">
                <div class="containerPortada">
                    <a href="{{ route('movie.show', $movie->id) }}">
                    <img class="portada" src="/assets/resource/portadas/{{$movie->portada}}">
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
        </div>
        @auth
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
                                    $(domElement.parent().parent()).fadeOut(500, function(){
                                        $(domElement).parent().parent().remove();
                                    });
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