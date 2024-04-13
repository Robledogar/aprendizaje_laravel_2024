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