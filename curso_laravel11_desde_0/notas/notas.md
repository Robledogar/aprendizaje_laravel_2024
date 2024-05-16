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

        - Laravel lleva un registro de las migraciones que ejecutamos (Lo hace por bloques (batchs))

        - Este comando revierte las migraciones del ultimo batch:
            php artisan migrate:rollback

        - Este comando crea una nueva migración:
            php artisan make:migration categories

        - Con esta otra sintaxis la crea pero con ayuda:
            php artisan make:migration create_categories_table

        - Este comando elimina todas las migraciones y las vuelve a ejecutar (efecto "actualizar todos los cambios realizados") (ahora todas tendrán el mismo batch)
            php artisan migrate:refresh

        - El siguiente comando se parece al anterior pero lo que hace primero es eliminar las tablas y volverlas a crear desde 0 (se usa si ya tienes alguna tabla incluida manualmente y las quieres eliminar también)
            php artisan migrate:fresh

        - Hay que tener en cuenta que estos métodos destruyen datos de la tabla. 

        - Este método NO sería destructivo con los datos de la tabla:
            php artisan make:migration add_avatar_to_users_table

            (avatar sería el nuevo campo y users la tabla a modificar) (esto crearía una nueva migración donde podremos añadir el nuevo campo)

                $table->string('avatar')->nullable();

                Añadir esto también en el down
                $table->dropColumn('avatar');

                (importante el nullable() para no comprometer las anteriores lineas)

            (Este nuevo campo se colocaría el último, pero para evitarlo, usamos este otro método (after()))
                $table->string('avatar')->nullable()->after('email');

    - Lo siguiente sería trabajar con los Modelos para interactuar con la base de datos (Elocuent (ORM))

        - Creamos el Modelo con este comando
            php artisan make:model Post

        - Dentro del Modelo le especificamos con qué tabla debe conectarse
            protected $table = 'posts';

        - creamos una ruta para trabajar con la tabla en web.php (importante importar allí el Modelo)
            use App\Models\Post;

        - Creamos una variable que se tratará en una nueva instancia de la clase del modelo (creamos el objeto)

            Route::get('prueba', function () {
                $post = new Post;
            });

        - Así le específicamos a Eloquent que tenemos la intención de crear un nuevo registro, pero aún no le hemos especificado qué valores tendrá ese registro. 

        - Eso lo haremos pasándoselo al objeto en forma de propiedad. Así:
            
            $post->title = 'Titulo de prueba 1';
            $post->content = 'Contenido de prueba 1';
            $post->categoria = 'Categoría de prueba 1';

        - Con el método save(), le decimos a Eloquent que lo grabe en la tabla

            $post->save();

        - Podemos hacer la prueba entrando en la ruta de prueba.

        - Apuntes de tipo CRUD
           
           CREAR UN REGISTRO

                $post->title = 'Titulo de prueba 2';
                $post->content = 'Contenido de prueba 2';
                $post->categoria = 'Categoría de prueba 2';

                $post->save();

            ACTUALIZAR UN REGISTRO

                $post = Post::find(2); (Esto sería para buscar por ID)

                $post = Post::where('title', 'Titulo de prueba 1')
                ->first(); (Esto filtraría por otro campo)

                $post = Post::all(); (Esto nos traería todos los registros)

                $post = Post::get(); (este método también los traería todos)

                $post = Post::where('id','>=', '2')
                ->get(); (Esto nos traería todos los registros con ID menor o igual a 2)

                $post = Post::orderBy('id', 'desc')
                ->get(); (Este método sirve para ordenar)

                $post = Post::orderBy('categoria', 'desc')
                ->select('id', 'title')
                ->get(); (Esto traería sólo los campos indicados)

                $post = Post::orderBy('categoria', 'desc')
                ->select('id', 'title')
                ->take(2)
                ->get(); (Esto sólo traería 2 registros)
                

                    Así sería:
                    $post = Post::where('title', 'Titulo de prueba 2')
                        ->first();

                    $post->categoria = 'Desarrollo web';
                    $post->save();


            ELIMINAR UN REGISTRO

                $post = Post::find(1);

                $post->delete();

            - MUY importante tener en cuenta el tema de los plurales que Eloquent interpreta por defecto

            Si no le indicamos el nombre de la tabla el le pondrá simplemente una "s" al final del nombre del modelo, si no encuentra su plural

            Mejor definir el nombre así:
            protected $table = 'posts';





            





