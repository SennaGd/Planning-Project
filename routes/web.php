<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;


Route::view('/', 'index')->name('home');
Route::view('/lesplein', 'lesplein')->name('lesplein');

Route::get('/ics/{activity}', [ActivityController::class, 'show']);
Route::post()

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
