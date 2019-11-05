@extends('layout.master')

@section('title', "Laravel - Usuarios")

@section('main')
    <table border="1px">
        <thead>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th colspan="2">Acciones</th>
        </thead>
        <tbody>
            @foreach ($listaUsuarios as $user)
            <tr>
                <td>{{$user->nick}}</td>
                <td>{{$user->nombre}}</td>
                <td>{{$user->apellidos}}</td>
                <td>{{$user->email}}</td>
                <td><a href="{{ route('user.edit', $user->id) }}">Modificar</a></td>
                <td><a href="{{ route('user.destroy', $user->id) }}">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection