<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;


Route::get('/', [ActivityController::class, 'index'])->name('home');
Route::view('/lesplein', 'lesplein')->name('lesplein');

Route::get('/ics/{activity}', [ActivityController::class, 'show']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
