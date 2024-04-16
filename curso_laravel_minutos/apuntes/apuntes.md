- php artisan make:model Post -msfc (crear un model, factory, migracion, seeder y controlador)
- php artisan migrate (para hacer las migraciones)
- php artisan migrate:refresh --seed

- php artisan db:seed (para llamar a todos los seeders creados)
- php artisan db:seed  o php artisan db:seed --class=UserSeeder
    public function run(): void
    {
        $this->call([
            PostSeeder::class 
        ]);
    
    }

    ejemplo en seeder creado:
        use App\Models\Post;
        {
            $post = Post::create([
                'title' => 'Primer título',
                'slug' => 'primer-titulo',
                'body' => 'lorem hhsdhfhdh sdddjdjd ssseeeekkkff'
            ]);
        }  

- php artisan migrate:fresh --seed (reconstruye la db) 
- - php artisan migrate:refresh (elimina y crea de nuevo la base de datos (puede añadirse --seed))