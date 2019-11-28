@extends('layout.master')
@section('title', "Laravel - Editar pelicula")

@section('main')
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <article>
        <div class="formContainerMovie">
            {{-- Selecciona la cabecera del formulario, dependiendo si es para modificar o anadir --}}
            @isset($datosPelicula)
                <form action="{{ route('movie.update', $datosPelicula->id) }}" method="post" enctype="multipart/form-data">    
                @method('PATCH')
            @else
                <form action="{{ route('movie.store') }}" method="post" enctype="multipart/form-data">
            @endisset

            {{-- Muestra los errores de validacion --}}
            @if ($errors->any())
                <div class="showFormErrors">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
                </div>
            @endif

                {{-- Todos los campos seran rellenados si se encuentran datos de una pelicula --}}
                @csrf
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required value="{{$datosPelicula->nombre ?? ''}}"><br>
                {{-- El campo de la portada solo es obligatorio para la insercion, no para la modificacion --}}
                <label for="portada">Portada</label>
                @isset($datosPelicula)
                    <input type="file" id="portada" name="portada"><br>
                @else
                    <input type="file" id="portada" name="portada" required><br>
                @endisset
                <label for="sinopsis">Sinopsis</label>
                <textarea id="portada" rows="4" maxlength="1000" name="sinopsis" placeholder="Descripción..." required>{{$datosPelicula->sinopsis ?? ''}}</textarea><br>
                <label for="url_trailer">Dirección URL del trailer</label>
                <input type="url" id="url_trailer" name="url_trailer" placeholder="https://" required value="{{$datosPelicula->url_trailer ?? ''}}"><br>
                <div class="formNumberMovie">
                    <label for="duracion">Duración (Minutos)</label>
                    <input type="number" id="duracion" name="duracion" placeholder="90" required value="{{$datosPelicula->duracion ?? ''}}"><br>
                </div>
                <div class="formNumberMovie">
                    <label for="anyo">Año</label>
                    <input type="number" id="anyo" name="anyo" placeholder="2019" required value="{{$datosPelicula->anyo ?? ''}}"><br>
                </div>

                {{-- Lista de generos --}}
                <label for="genero">Género</label>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary modalBtn modalGender" data-toggle="modal" data-target="#exampleModal">
                        Añadir genero
                    </button>
          
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo genero</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body bodyGender">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary sendGender" data-dismiss="modal">Guardar cambios</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <script>
                        $(function() {
                            // Carga el formulario de generos
                            $(".modalGender").click(function(){
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function(){
                                    // alert("ready: " + this.readyState + 
                                    // "\nstatus: " + this.status);
                                    if(this.readyState == 4 && this.status == 200){ 
                                        $(".modal-body").html(xhttp.responseText);
                                    }
                                }
                                var direccion = "{{route('gender.modalForm')}}";
                                xhttp.open("GET", direccion, true);
                                xhttp.send();
                            
                            });

                            // Envia el formulario de generos
                            $(".sendGender").click(function(){
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function(){
                                    if(this.readyState == 4 && this.status == 200){
                                        $("#genero").append(xhttp.responseText);
                                    }
                                }
                                var direccion = "{{route('gender.modalFormStore')}}";  
                                xhttp.open("POST", direccion, true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                var token = $(".bodyGender input[name='_token']").attr("value");
                                var nombre = $(".bodyGender input[name='nombreGenero']").val()
                                var data = "_token="+token+"&nombre="+nombre;
                                xhttp.send(data);
                            });
                        });
                    </script> 

                <select id="genero" name="generos[]" size="4" required multiple>
                    @foreach ($datosGeneros as $genero)
                        {{-- Muestra los generos que tiene esta pelicula seleccionados --}}
                        {{ $estaEnLista = false }}
                        @isset($generosPelicula)
                            @foreach ($generosPelicula as $generoPelicula)
                                    @if ($genero->id == $generoPelicula->id)
                                        <option value="{{$genero->id}}" selected="selected">{{$genero->nombre}}</option>
                                        {{ $estaEnLista = true }}
                                        @break
                                    @endif
                            @endforeach
                        @endisset
                        {{-- Si no tiene el genero, lo muestra sin seleccionar --}}
                        @if (!$estaEnLista)
                            <option value="{{$genero->id}}">{{$genero->nombre}}</option>
                        @endif    
                    @endforeach
                </select><br>

                {{-- Lista de directores --}}
                <label for="director">Director</label>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary modalBtn modalPerson" data-toggle="modal" data-target="#personas">
                        Añadir persona
                    </button>
          
                    <!-- Modal -->
                    <div class="modal fade" id="personas" tabindex="-1" role="dialog" aria-labelledby="personasLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="personasLabel">Nueva persona</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body bodyPerson">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary sendPerson" data-dismiss="modal">Guardar cambios</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <script>
                        $(function() {
                            // Carga el formulario de directores
                            $(".modalPerson").click(function(){
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function(){
                                    if(this.readyState == 4 && this.status == 200){ 
                                        $(".modal-body").html(xhttp.responseText);
                                    }
                                }
                                var direccion = "{{route('person.modalForm')}}";
                                xhttp.open("GET", direccion, true);
                                xhttp.send();
                            
                            });

                            // Envia el formulario de directores
                            $(".sendPerson").click(function(){
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function(){
                                    if(this.readyState == 4 && this.status == 200){
                                        $("#director").append(xhttp.responseText);
                                        $("#actor").append(xhttp.responseText);
                                    }
                                }
                                var direccion = "{{route('person.modalFormStore')}}";  
                                xhttp.open("POST", direccion, true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                var token = $(".bodyPerson input[name='_token']").attr("value");
                                var nombre = $(".bodyPerson input[name='nombrePersona']").val()
                                var data = "_token="+token+"&nombre="+nombre;
                                xhttp.send(data);
                            });
                        });
                    </script>
                <select id="director" name="directores[]" size="4 " required multiple>
                    @foreach ($datosPersonas as $director)
                        {{-- Muestra los directores que tiene esta pelicula seleccionados --}}
                        {{ $estaEnLista = false }}
                        @isset($directoresPelicula)
                            @foreach ($directoresPelicula as $existeDirector)
                                    @if ($director->id == $existeDirector->id)
                                        <option value="{{$director->id}}" selected="selected">{{$director->nombre}}</option>
                                        {{ $estaEnLista = true }}
                                        @break
                                    @endif
                            @endforeach
                        @endisset
                        {{-- Si no tiene el director, lo muestra sin seleccionar --}}
                        @if (!$estaEnLista)
                            <option value="{{$director->id}}">{{$director->nombre}}</option>
                        @endif    
                    @endforeach
                </select><br>
                
                {{-- Lista de actores --}}
                <label for="actor">Actores</label>
                <select id="actor" name="actores[]" size="4" required multiple>
                    @foreach ($datosPersonas as $actor)
                        {{-- Muestra los actores que tiene esta pelicula seleccionados --}}
                        {{ $estaEnLista = false }}
                        @isset($actoresPelicula)
                            @foreach ($actoresPelicula as $existeActor)
                                    @if ($actor->id == $existeActor->id)
                                        <option value="{{$actor->id}}" selected="selected">{{$actor->nombre}}</option>
                                        {{ $estaEnLista = true }}
                                        @break
                                    @endif
                            @endforeach
                        @endisset
                        {{-- Si no tiene el actor, lo muestra sin seleccionar --}}
                        @if (!$estaEnLista)
                            <option value="{{$actor->id}}">{{$actor->nombre}}</option>
                        @endif    
                    @endforeach
                </select><br>
                <input class="formSubmitMovie" type="submit" value="Guardar">
            </form>
        </div>
    </article>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection