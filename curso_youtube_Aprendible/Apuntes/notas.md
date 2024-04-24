Recomendación de usar Laragon en Windows (Laragon.org ) o herd.laravel.com en Mac

https://www.youtube.com/watch?v=thCwKk3nyJE&t=4013s
https://github.com/aprendible/aprendible-laravel-bootcamp


PASOS:
- Instalar la aplicación
    -h (para ver la ayuda en las instalaciones de terminal y más opciones)

- Instalamos dependencias para login 
    composer require laravel/breeze --dev
    php artisan breeze:install blade --dark
    se necesita crear en este punto una base de datos
    Ejecutar migraciones ()

- Traducimos la instalación
    composer require laravel-lang/common --dev (paquete no oficial)
    php artisan lang:add es
    modificar: 'locale' => 'es', en config/app.php
    añadir esta sintaxis donde necesite traducción adicional: {{ __('ejemplo') }}
    El archivo que contiene las traducciones es lang/es.json


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
- Dentro de resources/vistas/layouts/app.blade.php están los componentes reutilizables
- Tanbien podemos reutilizar cosas de la vista dashboard
- modificamos la vista layouts/navigation.blade.php (links de navegación y menú móvil)

- usar el comando npm run dev cuando se hacen cambios de tipo frontend (control + C para detener)

- tener en cuenta esta protección al usar POST: <form method="POST">
    @csrf    (protege contra ataques)

- php artisan make:model (para crear un modelo de elocuent para que interactue con la base de datos)
    php artisan make:model Chirp -mrc
    esto creará un modelo, una migración y un controlador
    Usar PascalCase

- Una migración es una clase que nos permite crear y modificar la estructura de la base de datos, podemos agregar, modificar y eliminar tablas y columnas.

- php artisan migrate (para ejecutar las migraciones)
    y php artisan migrate:rollback (del último BATCH (lote))
    o php artisan migrate:rollback --step=1 (para deshacer sólo la última migración)
    $table->foreignId('user_id')->constrained()->cascadeOnDelete(); (linea de ejemplo añadida)


- Añadir esta linea a web.php para poder usar el modelo. use App\Models\Chirp;
- añadido esto al modelo creado para evitar un error: 
        
        protected $fillable = [
        'message',
        'user_id',
    ];

- Así se prepara un texto para su traducción: 
    __('Chirp created successfully')
    luego se añade al json (en la carpeta lang)

- Utilizando sesiones para retornar feedback al usuario

  @if (session('ejemplo'))
    <div></div>
  @endif

  y con session()->flash('ejemplo', 'texto valor') en  web.php
  podemos usar tambien with()


  - Preparamos los controladores para no sobrecargar de código web.php


  - Validación de formulario: En chirp.controller.php
        // Validacion
        $request->validate([
            'message' => ['required', 'min:3']
        ]); 

        <!-- Componente para mostrar el error --> En index.blade.php
        <x-input-error :messages="$errors->get('message')"/>
  


- Eloquent relation
    //En user.php (modelo)
    public function chirps()
    {
        return $this->hasMany(Chirp::class);
    }

    Esto en ChirpController.php
        //Para insertar en la base de datos
        $request->user()->chirps()->create([
            'message' => $request->get('message'),
        ]);

- Listado de chirps

    Crear un foreach en la vista con la estructura
    luego ir al controlador y poner esto:
        return view('chirps.index', [
            'chirps' => Chirp::all()
        ]);


@dump($variable) Esto sirve para ver una variable que esté disponible en una vista

- Recordar establecer las relacciones entre tablas
    Ejemplo:
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    Así vemos las consultas sql:
        DB::listen(function ($query) {
        dump($query->sql);
        });

    (Descubrimos el problema N+1)
    Lo solucionamos así
         public function index()
        {
            return view('chirps.index', [
                'chirps' => Chirp::with('user')->latest()->get()
            ]);
        }

- Editar registros
     public function edit(Chirp $chirp)
    {
        return view('chirps.edit', [
            'chirp' => $chirp
        ]);
    }

- Actualizar registros
    para put:
        @csrf @method('PUT') en formularios