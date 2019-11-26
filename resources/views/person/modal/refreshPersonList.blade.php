@foreach ($datosPersona as $valor)
    <option value="{{ $valor->id }}">{{ $valor->nombre }}</option>    
@endforeach