<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::create([
            'title' => 'Cómo aprender Laravel desde cero',
            'slug' => 'como-aprender-laravel-desde-cero',
            'body' => 'Consejos y recursos para empezar a aprender Laravel desde cero.'
        ]);
        
        $post = Post::create([
            'title' => 'Los mejores frameworks de JavaScript en 2023',
            'slug' => 'los-mejores-frameworks-de-javascript-en-2023',
            'body' => 'Una comparativa de los frameworks de JavaScript más populares del momento.'
        ]);
        
        $post = Post::create([
            'title' => '10 herramientas esenciales para desarrolladores web',
            'slug' => '10-herramientas-esenciales-para-desarrolladores-web',
            'body' => 'Una lista de herramientas imprescindibles para cualquier desarrollador web.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear una aplicación web con Laravel y Vue.js',
            'slug' => 'como-crear-una-aplicacion-web-con-laravel-y-vuejs',
            'body' => 'Tutorial paso a paso para crear una aplicación web con Laravel y Vue.js.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo optimizar el rendimiento de tu sitio web',
            'slug' => 'como-optimizar-el-rendimiento-de-tu-sitio-web',
            'body' => 'Consejos y técnicas para mejorar el rendimiento de tu sitio web.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear un blog con WordPress en 2023',
            'slug' => 'como-crear-un-blog-con-wordpress-en-2023',
            'body' => 'Tutorial actualizado para crear un blog con WordPress en 2023.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo diseñar una landing page efectiva',
            'slug' => 'como-disenar-una-landing-page-efectiva',
            'body' => 'Consejos y buenas prácticas para diseñar una landing page que convierta.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear una tienda online con WooCommerce',
            'slug' => 'como-crear-una-tienda-online-con-woocommerce',
            'body' => 'Tutorial para crear una tienda online con WooCommerce desde cero.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo mejorar el SEO de tu sitio web',
            'slug' => 'como-mejorar-el-seo-de-tu-sitio-web',
            'body' => 'Consejos y técnicas para mejorar el posicionamiento de tu sitio web en buscadores.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear una aplicación móvil con React Native',
            'slug' => 'como-crear-una-aplicacion-movil-con-react-native',
            'body' => 'Tutorial para crear una aplicación móvil con React Native.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear un formulario de contacto en HTML y CSS',
            'slug' => 'como-crear-un-formulario-de-contacto-en-html-y-css',
            'body' => 'Tutorial para crear un formulario de contacto básico en HTML y CSS.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear una API REST con Laravel',
            'slug' => 'como-crear-una-api-rest-con-laravel',
            'body' => 'Tutorial para crear una API REST con Laravel y Eloquent.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear un sistema de autenticación en Laravel',
            'slug' => 'como-crear-un-sistema-de-autenticacion-en-laravel',
            'body' => 'Tutorial para crear un sistema de autenticación básico en Laravel.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear una base de datos en MySQL',
            'slug' => 'como-crear-una-base-de-datos-en-mysql',
            'body' => 'Tutorial para crear una base de datos en MySQL desde cero.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear un sistema de comentarios en Laravel',
            'slug' => 'como-crear-un-sistema-de-comentarios-en-laravel',
            'body' => 'Tutorial para crear un sistema de comentarios básico en Laravel.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear un sistema de votación en Laravel',
            'slug' => 'como-crear-un-sistema-de-votacion-en-laravel',
            'body' => 'Tutorial para crear un sistema de votación básico en Laravel.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear un sistema de notificaciones en Laravel',
            'slug' => 'como-crear-un-sistema-de-notificaciones-en-laravel',
            'body' => 'Tutorial para crear un sistema de notificaciones básico en Laravel.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear un sistema de pago en Laravel',
            'slug' => 'como-crear-un-sistema-de-pago-en-laravel',
            'body' => 'Tutorial para crear un sistema de pago básico en Laravel.'
        ]);
        
        $post = Post::create([
            'title' => 'Cómo crear un sistema de reservas en Laravel',
            'slug' => 'como-crear-un-sistema-de-reservas-en-laravel',
            'body' => 'Tutorial para crear un sistema de reservas básico en Laravel.'
        ]);
        
    }
}
