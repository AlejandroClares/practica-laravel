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