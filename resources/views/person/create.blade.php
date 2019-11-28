@extends('layout.master')

@section('title', "Laravel - Crear nueva persona")

@section('main')
    <form action="{{route('person.store')}}" method="post">
        @csrf 
        Nombre:<br> 
        <input type="text" name="nombre"><br>
        <input type="submit" value="Guardar">
    </form>
@endsection