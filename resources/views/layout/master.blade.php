<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        {{-- <script type="text/javascript" src="assets/js/ajax.js"></script> --}}
        
    </head>
    <body>
        <div id="container">
            <nav>
                <div class="inicio">
                    <a href="{{ route('movie.index') }}">Inicio</a>
                </div>
                @auth
                    <div class="adminTools">
                        <a href="{{ route('user.closeSession') }}">Cerrar sesión</a>
                    </div>
                    <div class="adminTools">
                        <a href="{{ route('user.index') }}">Usuarios</a>
                    </div>
                    <div class="adminTools">
                        <a href="{{ route('gender.index') }}">Generos</a>
                    </div>
                    <div class="adminTools">
                        <a href="{{ route('person.index') }}">Personas</a>
                    </div>
                    
                @endauth
            </nav>
            <main>
                @yield('main')
            </main>
        </div>
    </body>
</html>