@extends('layout.master')

@section('title', "Laravel - Ver pelicula")

@section('main')
    <article>
        <div class="showContainerMovieImage">
            <img src="/assets/resource/portadas/{{ $datosPelicula->portada }}">
        </div>
        <div class="showContainerMovieInfo">
            <div class="showContainerMovieInfoSimple">
                <h2>{{ $datosPelicula->nombre }}</h2>
                <p><span>Duración:</span> {{ $datosPelicula->duracion }} minutos.</p>
                <p><span>Año de estreno:</span> <a href="{{ route('movie.searchYear', $datosPelicula->anyo) }}"> {{ $datosPelicula->anyo }}</a>.</p>
            
                {{-- 
                Las listas de directores, actores y generos se generan asi: 
                "Generos: Terror, Accion, Comedia."    
                --}}

                {{-- Genera los directores --}}
                @if(count($datosDirector) > 0)
                    <p><span>Directores:</span> 
                    @for ($i = 0; $i < count($datosDirector)-1; $i++)
                        <a href="{{ route('movie.searchDirector', $datosDirector[$i]->id) }}">{{ $datosDirector[$i]->nombre }}</a>,
                        @if ($i == count($datosDirector)-2)
                            @break
                        @endif
                    @endfor
                    <a href="{{ route('movie.searchDirector', $datosDirector[count($datosDirector)-1]->id) }}">{{ $datosDirector[count($datosDirector)-1]->nombre }}</a>.
                    </p>
                @endif

                {{-- Genera los actores --}}
                @if(count($datosActor) > 0)
                    <p><span>Actores:</span> 
                    @for ($i = 0; $i < count($datosActor)-1; $i++)
                    <a href="{{ route('movie.searchActor', $datosActor[$i]->id) }}">{{ $datosActor[$i]->nombre }}</a>,
                        @if ($i == count($datosActor)-2)
                            @break
                        @endif
                    @endfor
                    <a href="{{ route('movie.searchActor', $datosActor[count($datosActor)-1]->id) }}">{{ $datosActor[count($datosActor)-1]->nombre }}</a>.
                    </p>
                @endif

                {{-- Genera los generos. --}}
                @if(count($datosGenero) > 0)
                    <p><span>Géneros:</span> 
                    @for ($i = 0; $i < count($datosGenero)-1; $i++)
                        <a href="{{ route('movie.searchGender', $datosGenero[$i]->id) }}">{{ $datosGenero[$i]->nombre }}</a>,
                        @if ($i == count($datosGenero)-2)
                            @break
                        @endif
                    @endfor
                    <a href="{{ route('movie.searchGender', $datosGenero[count($datosGenero)-1]->id) }}">{{ $datosGenero[count($datosGenero)-1]->nombre }}</a>.
                    </p>
                @endif
            </div>
            <div class="showContainerMovieInfoSinopsis">
                <p><span>Sinopsis</span></p>
                <p>{{ $datosPelicula->sinopsis }}</p>
            </div>
            <div class="showContainerMovieInfoTrailer">
                <div class="video">
                    <iframe width="100%" height="425" src="{{ $datosPelicula->url_trailer }}"
                    frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
                </div>
            </div>
        </div>
        
        
    </article>

@endsection