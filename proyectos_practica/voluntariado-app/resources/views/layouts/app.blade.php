<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">  
</head>
    
<body>
    
    <header>
        
        
    <div class="contenedor-encabezado">
        <h1>Voluntariado App</h1>
        <nav>
        <ul>
            <li><a href="{{ route('home') }}">Inicio</a></li>
            <li><a href="{{ route('inscribete') }}">Inscríbete</a></li>
            <li><a href="{{ route('acerca-de') }}">Acerca de</a></li>
            <li><a href="{{ route('voluntarios') }}">Nuestros voluntarios</a></li>
            <li><a href="{{ route('contacto') }}">Contacto</a></li>
        </ul>
        </nav>
    </div>
    </header>

    <main>
        @yield('content') 
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Voluntariado-app</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>  </body>
</html>
