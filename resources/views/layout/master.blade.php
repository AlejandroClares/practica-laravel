<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="{{route('user.create')}}">Insertar nuevo usuario</a></li>
            </ul>
        </nav>
        <main>
            @yield('main')
        </main>
    </body>
</html>