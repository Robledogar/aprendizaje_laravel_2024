Recomendación de usar Laragon en Windows (Laragon.org ) o herd.laravel.com en Mac

PASOS:
- Instalar la aplicación
- Instalamos dependencias para login 
    composer require laravel/breeze --dev
    php artisan breeze:install
    se necesita una base de datos
- Traducimos la instalación
    composer require laravel-lang/common --dev
    php artisan lang:add es
    modificar: 'locale' => 'es', en config/app.php
    añadir esta sintaxis donde necesite traducción adicional: {{ __('ejemplo') }}

- tema de routing
    este comando sirve para conocer las rutas: php artisan route:list

    ejemplos de sintaxis:
                        Route::get('/', function () { 
                        // return view('welcome');
                        return 'Hola a todos';
                    });

                    puede simplificarse si sólo devuelve un return con la vista: Route::view('/', 'welcome');

                    Route::get('/chirps', function () {
                        
                        return 'Welcome to our chirps page';
                    });

                    // Route::get('/chirps/{chirp?}', function ($chirp = null) {
                        
                    //     return 'Welcome to our chirps page' . $chirp;
                    // });

                    Route::get('/chirps/{chirp?}', function ($chirp = null) {
                        
                        if($chirp === '2') {
                            return redirect('/chirps');
                        }
                        return 'Chirp detail' .$chirp;
                    });

                            Route::get('/chirps/{chirp}', function ($chirp) {
                        
                        if($chirp === '2') {
                            return to_route('chirps.index');
                        }
                        return 'Chirp detail' .$chirp;
                    });

- usar el comando npm run dev cuando se hacen cambios de tipo frontend (control + C para detener)

- tener en cuenta esta protección al usar POST: <form method="POST">
    @csrf    

- php artisan make:model (para crear un modelo de elocuent para que interactue con la base de datos)
    php artisan make:model Chirp -mrc
    esto creará un modelo, una migración y un controlador

- Una migración es una clase que nos permite crear y modificar la estructura de la base de datos, podemos agregar, modificar y eliminar tablas y columnas.

- php artisan migrate (para ejecutar las migraciones)
    y php artisan migrate:rollback (del último BATCH)
    o php artisan migrate:rollback --step=1 (para deshacer sólo la última migración)
    $table->foreignId('user_id')->constrained()->cascadeOnDelete(); (linea de ejemplo añadida)

- añadido esto al modelo creado para evitar un error: 
        
        protected $fillable = [
        'message',
        'user_id',
    ];

- Así se prepara un texto para su traducción: 
    __('Chirp created successfully')
    luego se añade al json (en la carpeta lang)


