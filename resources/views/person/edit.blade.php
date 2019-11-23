@extends('layout.master')
@section('title', "Laravel - Editar persona")

@section('main')
    <form action="{{ route('person.update', $datosPersona->id) }}" method="post">
        @csrf
        @method('PATCH')
        {{-- Muestra los errores de validacion --}}
        @if ($errors->any())
            <div class="showFormErrors">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        Nombre:<br>
        <input type="text" name="nombre" value="{{$datosPersona->nombre}}"><br>
        <input type="submit" value="Modificar">
    </form>
@endsection