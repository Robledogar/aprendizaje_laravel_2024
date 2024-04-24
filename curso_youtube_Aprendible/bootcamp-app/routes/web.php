<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Chirp;

// DB::listen(function ($query) {
//     dump($query->sql);
// });

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

Route::view('/', 'welcome')->name('welcome');


// Route::view('/', 'welcome');
    



// Route::get('/chirps/{chirp?}', function ($chirp = null) {
    
//     return 'Welcome to our chirps page' . $chirp;
// });

// Route::get('/chirps/{chirp}', function ($chirp) {
    
//     if($chirp === '2') {
//         return to_route('chirps.index');
//     }
//     return 'Chirp detail' .$chirp;
// });

// Otros tipos de routes
// Route::post();
// Route::put();
// Route::delete();
// Route::patch();



Route::middleware('auth')->group(function () {

    Route::view('/dashboard','dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/chirps', function () {   
        return view('chirps.index');
    })->name('chirps.index');

    Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');
    Route::post('/chirps',[ChirpController::class, 'store'])
        ->name('chirps.store');

    Route::get('/chirp/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');
});

require __DIR__.'/auth.php';
