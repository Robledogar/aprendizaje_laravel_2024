Proceso:
    - Todo inicia en el archivo de rutas web.php
        -- En él van las rutas con texto, a vista o controlador
        -- para crear controladores:
            php artisan make:controller HomeController
        -- En web.php hay que importar el namespace del controlador:
                 use App\Http\Controllers\HomeController;
        -- Dentro del controlador se añaden las funciones
                public function index()
                    {
                        return "Bienvenidos a la home del proyecto";
                    }

                    si sólo tiene un método puede usarse __invoke() (así sólo hay que hacer referencia al controlador al llamar a la ruta)
        -- En web.php la sintaxis para enviar al controlador es:
                Route::get('/', [HomeController::class, 'index']);
    - Los controladores (o las rutas directamente) pueden dirigir hacia una vista
    - Creamos la vista de forma manual con esta sintaxis home.blade.php
    - En el controlador retornamos esto con la ruta de la vista.
        return view('posts.index');

    - Pueden pasarse variables hacia las vistas así:
            public function show($post)
                {
                    return view('posts.show', [
                        'post' => $post,
                        'numero' => 550
                    ]);
                }

                o así:
                return view('posts.show', compact('post', 'numero'));

        - Se recogen así en web.php:
            Route::get('/posts/{post}', [PostController::class, 'show']);
        - Se imprimen así en la vista:
            <h1>Aquí se mostrará el post {{ $post }}</h1>

        - En la vista pueden utilizarse directivas de este tipo: 
                @if (false)
                    <h2>El número es {{$numero}}...</h2>
                @endif

        - Podemos importar Tailwind a una vista:    <script src="https://cdn.tailwindcss.com"></script>

        - Podemos crear componentes para reutilizarlos en el proyecto
            - se crea la carpeta components dentro de views (alert.blade.php por ejemplo)
                ejemplo: 
                        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                        <span class="font-medium">{{$otraVariable ?? 'Info Alert'}}</span> {{ $slot }}
                        </div>
            - Se reutiliza así en las vistas:
                <x-alert>
                    <x-slot name="otraVariable">
                        Alertaaaaa!
                    </x-slot>
                    Contenido de la alerta
                </x-alert>

            - puede pasarse información tambien mediante atributos:
                <x-alert type="info">
            - Ver ejemplo del componente alert creado (usando switch para hacerlo dinámico)

        - Creando un componente de clase:
             php artisan make:component Alert2
             (Sirven para separar la lógica de la vista)
        - Los anteriores componentes se llaman "anónimos"

    - Siguiente paso sería la creación de plantillas
        - La primera opción sería mediante un componente (suele usarse más)
            etc ..........
            <header></header>
                
                {{$slot}}

            <footer></footer>
            etc ..........

            y en la vista

                <x-app-layout>
                    codigo.....
                </x-app-layout>

        - La otra opción es creando una plantilla
            - Dentro de views creamos la carpeta layouts

                    <header></header>

                         @yield('content')

                    <footer></footer>

                    se pueden colocar más yield:
                        <title>@yield('tittle')</title>

                        o así:
                            <title>@yield('tittle', 'valor por defecto')</title>

                    y en la vista:

                    @extends('layouts.app');

                        @section('content')
    
                    @endsection

                    - si es una sóla línea puede hacerse así:
                        @section('tittle', 'Titulo Yield')

                - puede usarse también la combinacion:
                    @stack('css') o @stack('js') (para el css y el js)

                        + en la vista

                    @push('css')
                        <style>
                            body {
                                background-color: yellow;
                            }
                        </style>
    
                    @endpush

                    (La diferencia es que yield sólo se puede utilizar una vez en la vista y push pueden ser varias veces)
                    (en este caso push iría añadiendo los estilos)

    

        - Lo siguiente sería conectar con la base de datos
            - En Laravel 11 ya te viene una DB dentro de database (database.sqlite) (puede descargarse un software para manejarla https://sqlitebrowser.org/dl/)

            - Si queremos usar mysql hay que fijarse en el archivo config/database.php

            - Allí vemos que el que hay que configurar realmente es el .env (modificando esta variable: DB_CONNECTION=mysql)

            - También hay que descomentar estas:        
                DB_HOST=127.0.0.1
                DB_PORT=3306
                DB_DATABASE=blog
                DB_USERNAME=root
                DB_PASSWORD=

            (poner correctamente esos datos)
            - Ejecutar e php artisan migrate
                (si falla, hay que fijarse que estén igual los cotejamientos utf8mb4_unicode_ci)

    - Lo siguiente serían las Migraciones (son una especie de control de versiones de la base de datos)