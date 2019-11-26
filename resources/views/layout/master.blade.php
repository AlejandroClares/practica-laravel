<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
        
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
                        <a href="{{ route('user.index') }}">Tabla usuarios</a>
                    </div>
                    <div class="adminTools">
                        <a href="{{ route('gender.index') }}">Tabla generos</a>
                    </div>
                    <div class="adminTools">
                        <a href="{{ route('person.index') }}">Tabla personas</a>
                    </div>
                    <div class="adminTools">
                        <a href="{{ route('user.closeSession') }}">Cerrar sesión</a>
                    </div>
                @endauth
            </nav>
            <main>
                @yield('main')
            </main>
        </div>
    </body>
</html>