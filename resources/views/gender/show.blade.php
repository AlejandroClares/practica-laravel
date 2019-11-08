@extends('layout.master')

@section('title', "Laravel - Ver genero")

@section('main')
    <h3>Datos de genero</h3>

    <form action="{{ route('gender.destroy', $datosGenero->id) }}" method="post">
        @csrf
        @method('DELETE')
        Nombre:<br>
        <input type="text" value="{{ $datosGenero->nombre }}" disabled><br>
        <br>
        <input type="submit" value="Eliminar genero">
    </form>
@endsection