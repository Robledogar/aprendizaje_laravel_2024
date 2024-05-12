1- Instalación de Laravel (https://laravel.com/docs/11.x/installation)

2- Configurar Bases de datos y Migraciones
    Modificar el archivo .env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=

3- Entender cómo funciona el marco de Laravel (https://laravel.com/docs/11.x/lifecycle)

4- Frontend
    - Rutas
    - Vistas

5- Modelo, controlador y migracion
    -añadí esto a modelo (por la protección de asignación masiva):
        protected $fillable = [
            'message',
            'user_id',
        ];

    - Esto en rutas:
        Route::resource('inscribirse', InscribirseController::class);
    
    - Usé este vídeo(https://www.youtube.com/watch?v=Qpsy89EQ85c)






<form action="{{ route('inscribirse') }}" method="POST"> 
        @csrf

        <div class="grupo-formulario">
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" class="control-formulario" required>
        </div>

        <div class="grupo-formulario">
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" class="control-formulario" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar formulario</button>
    </form>