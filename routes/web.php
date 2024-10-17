<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// route: /hello
// method: GET, POST,PUT,PATCH,DELETE -> retapi 

Route::get('/hello', function () {
    return 'Hello beben';
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
