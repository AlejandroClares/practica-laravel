@extends('layout.master')

@section('title', "Laravel - Generos")

@section('main')
    <a href="{{route('gender.create')}}">Insertar nuevo genero</a><br>
    <table border="1px">
        <thead>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
        </thead>
        <tbody>
            @foreach ($datosGeneros as $gender)
            <tr>
                <td>{{$gender->nombre}}</td>
                <td><a href="{{ route('gender.edit', $gender->id) }}">Modificar</a></td>
                <td><a href="{{ route('gender.destroy', $gender->id) }}">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection