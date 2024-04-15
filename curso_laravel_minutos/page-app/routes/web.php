<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'home')->name('home');
Route::view('acerca-de', 'about')->name('about');

Route::get('blog', 'BlogController@index')->name('blog.index');
Route::get('blog/{post:slug}', 'BlogController@show')->name('blog.show');

Route::view('contactos', 'contact')->name('contact');

