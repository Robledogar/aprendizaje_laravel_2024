<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'welcome to the homepage';
});

Route::get('/posts/{post}', function($post) {
    return "Aquí se mostrará el post {$post}";
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