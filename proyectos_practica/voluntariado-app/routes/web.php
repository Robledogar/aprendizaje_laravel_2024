<?php

use App\Http\Controllers\InscribirseController;
use App\Models\Inscribirse;
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


Route::get('/inscribirse', function() {
    $inscrito = new Inscribirse;

    $inscrito->nombre = 'Jose Luís';
    $inscrito->email = 'jose@gmail.com';

    $inscrito->save();

    return $inscrito;


});






