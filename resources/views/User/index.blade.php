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
        </thead>
        <tbody>
            @foreach ($listaUsuarios as $user)
            <tr>
                <td>{{$user}}->nick</td>
                <td>{{$user}}->password</td>
                <td>{{$user}}->nombre</td>
                <td>{{$user}}->apellidos</td>
                <td>{{$user}}->email</td>
                <td>{{$user}}->tipo</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection