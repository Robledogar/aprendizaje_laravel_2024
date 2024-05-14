<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/', HomeController::class,); //por tener el método __invoke()en el controlador

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/create', [PostController::class, 'create'])->name('create');
Route::get('/posts/{post}', [PostController::class, 'show']);





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