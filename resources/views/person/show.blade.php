@extends('layout.master')

@section('title', "Laravel - Ver persona")

@section('main')
    <form action="{{ route('person.destroy', $datosPersona->id) }}" method="post">
        @csrf
        @method('DELETE')
        Nombre:<br>
        <input type="text" value="{{ $datosPersona->nombre }}" disabled><br>
        <br>
        <input type="submit" value="Eliminar genero">
    </form>
@endsection