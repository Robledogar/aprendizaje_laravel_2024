<?php

use App\Http\Controllers\InscribirseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); 
})->name('home'); // Asigna el nombre "home" a la ruta principal

Route::get('/acerca-de', function () {
    return view('about'); 
})->name('acerca-de'); // Asigna el nombre "about" a la ruta "Acerca de"

Route::get('/contacto', function () {
    return view('contact'); 
})->name('contacto'); // Asigna el nombre "contact" a la ruta "Contacto"

Route::get('/inscribete', function () {
    return view(('inscribete'));
})->name('inscribete');


Route::resource('inscribirse', InscribirseController::class);





