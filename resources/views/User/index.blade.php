@extends('layout.master')

@section('title', "Laravel - Usuarios")

@section('main')
    <a href="{{route('user.create')}}">Insertar nuevo usuario</a><br>
    <table border="1px">
        <thead>
            <th>Nombre</th>
            <th>Email</th>
            <th colspan="2">Acciones</th>
        </thead>
        <tbody>
            @foreach ($listaUsuarios as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="{{ route('user.edit', $user->id) }}">Modificar</a></td>
                <td><a href="{{ route('user.destroy', $user->id) }}">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection