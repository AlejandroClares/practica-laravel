@extends('layout.master')

@section('title', "Laravel - Ver pelicula")

@section('main')
    <article>
        <div class="showContainerMovieImage">
            <img src="/assets/resource/portadas/{{ $datosPelicula->portada }}">
        </div>
        <div class="showContainerMovieInfo">
            <h2>{{ $datosPelicula->nombre }}</h2>
            <p><span>Duración:</span> {{ $datosPelicula->duracion }} minutos.</p>
            <p><span>Año de estreno:</span> {{ $datosPelicula->anyo }}.</p>
           
            {{-- 
            Las listas de directores, actores y generos se generan asi: 
            "Generos: Terror, Accion, Comedia."    
            --}}

            {{-- Genera los directores --}}
            @if(count($datosDirector) > 0)
                <p><span>Directores:</span> 
                @for ($i = 0; $i < count($datosDirector)-1; $i++)
                    {{ $datosDirector[$i]->nombre }},
                    @if ($i == count($datosDirector)-2)
                        @break
                    @endif
                @endfor
                {{ $datosDirector[count($datosDirector)-1]->nombre }}.
                </p>
            @endif

            {{-- Genera los actores --}}
            @if(count($datosActor) > 0)
                <p><span>Actores:</span> 
                @for ($i = 0; $i < count($datosActor)-1; $i++)
                    {{ $datosActor[$i]->nombre }},
                    @if ($i == count($datosActor)-2)
                        @break
                    @endif
                @endfor
                {{ $datosActor[count($datosActor)-1]->nombre }}.
                </p>
            @endif

            {{-- Genera los generos. --}}
            @if(count($datosGenero) > 0)
                <p><span>Géneros:</span> 
                @for ($i = 0; $i < count($datosGenero)-1; $i++)
                    {{ $datosGenero[$i]->nombre }},
                    @if ($i == count($datosGenero)-2)
                        @break
                    @endif
                @endfor
                {{ $datosGenero[count($datosGenero)-1]->nombre }}.
                </p>
            @endif
        </div>
    </article>

@endsection