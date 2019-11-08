@extends('layout.master')
@section('title', "Laravel - Editar genero")

@section('main')
    <form action="{{ route('gender.update', $datosGenero->id) }}" method="post">
        @csrf
        @method('PATCH')
        Nombre:<br>
        <input type="text" name="nombre" value="{{$datosGenero->nombre}}"><br>
        <input type="submit" value="Modificar">
    </form>
@endsection