<?php

use App\Http\Controllers\InscribirseController;
use App\Http\Controllers\VoluntariosController;
use App\Models\Inscribirse;
use Illuminate\Support\Facades\Route;



Route::view('/', 'welcome')->name('home'); // Asigna el nombre "home" a la ruta principal


Route::get('/acerca-de', function () {
    return view('about'); 
})->name('acerca-de'); // Asigna el nombre "about" a la ruta "Acerca de"


Route::get('/contacto', function () {
    return view('contact'); 
})->name('contacto'); // Asigna el nombre "contact" a la ruta "Contacto"


Route::get('/inscribete', function () {
    return view(('inscribete'));
})->name('inscribete');

Route::get('/registrado', function () {
    return view(('registrado'));
})->name('registrado');

Route::get('/inscribirse', [InscribirseController::class, 'index'])->name('inscribirse');

Route::post('/inscribirse', [InscribirseController::class, 'store'])->name('inscribirse');

Route::get('/voluntarios', [VoluntariosController::class, 'index'])->name('voluntarios');




