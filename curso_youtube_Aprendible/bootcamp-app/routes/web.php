<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
    
});

// Route::view('/', 'welcome');
    

Route::get('/chirps', function () {   
    return 'Welcome to our chirps page';
})->name('chirps.index');

// Route::get('/chirps/{chirp?}', function ($chirp = null) {
    
//     return 'Welcome to our chirps page' . $chirp;
// });

// Route::get('/chirps/{chirp}', function ($chirp) {
    
//     if($chirp === '2') {
//         return to_route('chirps.index');
//     }
//     return 'Chirp detail' .$chirp;
// });



Route::middleware('auth')->group(function () {

    Route::view('/dashboard','dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/chirps', function () {   
        return view('chirps.index');
    })->name('chirps.index');

    Route::post('/chirps', function () {   
        $message = request('message');
        //Para insertar en la base de datos
    });
});

require __DIR__.'/auth.php';
