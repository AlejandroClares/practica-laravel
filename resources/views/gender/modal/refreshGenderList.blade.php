@foreach ($datosGenero as $valor)
<option value="{{ $valor->id }}">{{ $valor->nombre }}</option>    
@endforeach
