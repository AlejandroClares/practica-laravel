@extends('layout.master')

@section('title', "Laravel - Ver pelicula")

@section('main')
    {{-- <form action="{{ route('movie.destroy', $datosPelicula->id) }}" method="post">
        @csrf
        @method('DELETE')
        Portada:<br>
        <input type="text" value="{{ $datosPelicula->portada }}" disabled><br>
        Nombre:<br>
        <input type="text" value="{{ $datosPelicula->nombre }}" disabled><br>
        Duracion:<br>
        <input type="text" value="{{ $datosPelicula->duracion }}" disabled><br>
        Año:<br>
        <input type="text" value="{{ $datosPelicula->anyo }}" disabled><br>
        Generos:<br>
        @foreach ($datosGenero as $genero)
        <input type="text" value="{{ $genero->nombre }}" disabled><br>
        @endforeach
        <br>
        <input type="submit" value="Eliminar usuario">
    </form> --}}
    <article>
        <div class="showContainerMovieImage">
            <img src="{{ $datosPelicula->portada }}" alt="{{ $datosPelicula->nombre }}">
        </div>
        <div class="showContainerMovieInfo">
            <h2>{{ $datosPelicula->nombre }}</h2>
            <p>Duracion: {{ $datosPelicula->duracion }} minutos</p>
            <p>Año de estreno: {{ $datosPelicula->anyo }}</p>
            <p>Generos: 
                {{-- @foreach ($datosGenero as $genero)
                    {{ $genero->nombre }} 
                @endforeach --}}
                @for ($i = 0; $i < count($datosGenero); $i++)
                    {{ $datosGenero[$i]->nombre }},
                    @if ($i == count($datosGenero)-2)
                        @break
                    @endif
                @endfor
                {{ $datosGenero[count($datosGenero)-1]->nombre }}.
            </p>
        </div>
    </article>

@endsection