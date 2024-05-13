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

                    si sólo tiene un método puede usarse __invoke()
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