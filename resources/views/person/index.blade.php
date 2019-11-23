@extends('layout.master')

@section('title', "Laravel - Personas")

@section('main')
    <a href="{{route('person.create')}}">Insertar nueva persona</a><br>
    <table border="1px">
        <thead>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
        </thead>
        <tbody>
            @foreach ($datosPersonas as $persona)
            <tr>
                <td>{{$persona->nombre}}</td>
                <td><a href="{{ route('person.edit', $persona->id) }}">Modificar</a></td>
                <td><a href="{{ route('person.destroy', $persona->id) }}">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection