@extends('layout.master')

@section('title', "Laravel - Crear persona")

@section('main')
    <form action="{{route('person.store')}}" method="post">
        @csrf 
         {{-- Muestra los errores de validacion --}}
         @if ($errors->any())
            <div class="showFormErrors">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
         @endif
         
        Nombre:<br> 
        <input type="text" name="nombre"><br>
        <input type="submit" value="Guardar">
    </form>
@endsection