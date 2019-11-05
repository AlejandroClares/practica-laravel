@extends('layout.master')

@section('title', "Laravel - Usuarios")

@section('main')
    <table border="1px">
        <thead>
            <th>Nick</th>
            <th>Contraseña</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>tipo</th>
            <th colspan="2">Herramientas</th>
        </thead>
        <tbody>
            @foreach ($listaUsuarios as $user)
            <tr>
                <td>{{$user->nick}}</td>
                <td>{{$user->passwd}}</td>
                <td>{{$user->nombre}}</td>
                <td>{{$user->apellidos}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->tipo}}</td>
                <td><a href="{{ route('user.edit', $user->id) }}">Modificar</a></td>
                <td><a href="{{ route('user.destroy', $user->id) }}">Eliminar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection