@extends('layout.master')

@section('title', "Laravel - Ver pelicula")

@section('main')
    <article>
        <div class="showContainerMovieImage">
            <img src="{{ $datosPelicula->portada }}">
        </div>
        <div class="showContainerMovieInfo">
            <h2>{{ $datosPelicula->nombre }}</h2>
            <p><span>Duración:</span> {{ $datosPelicula->duracion }} minutos.</p>
            <p><span>Año de estreno:</span> {{ $datosPelicula->anyo }}.</p>
            {{-- Genera los generos de la siguiente forma -> Genero: Terror, Accion. --}}
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