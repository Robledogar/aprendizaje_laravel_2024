<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', HomeController::class,); //por tener el método __invoke()en el controlador

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/create', [PostController::class, 'create'])->name('create');
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('prueba', function () {
    
    $post = new Post;

    // CREAR UN POST

    // $post->title = 'Titulo de prueba 4';
    // $post->content = 'Contenido de prueba 4';
    // $post->categoria = 'Categoría de prueba 4';

    // $post->save();

    // return $post;

    //ACTUALIZAR UN POST

    $post = Post::find(1);
    return $post->is_active;

    // $post = Post::where('title', 'Titulo de prueba 2')
    //             ->first();

    // $post->categoria = 'Desarrollo web';
    // $post->save();

    // return $post;

    // $post = Post::orderBy('categoria', 'desc')
    //         ->select('id', 'title')
    //         ->take(2)
    //         ->get();

    // return $post;

    //ELIMINAR UN REGISTRO
    // $post = Post::find(1);

    // $post->delete();

    

});





// Route::get('/posts/{post}/{category?}', function($post, $category = null) {
    
//     //     if($category) {
//     //         return "Aquí se mostrará el post {$post} de la categoría {$category}";
//     //     }
        
//     //     return "Aquí se mostrará el post {$post}";
//     // });
    




//Get -> desde url
//Post -> desde formulario
//Put -> como get para actualizar
//Patch -> como get para actualizar
//Delete -> como get para eliminar