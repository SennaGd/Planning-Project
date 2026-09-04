<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;


Route::view('/', 'index')->name('home');
Route::view('/lesplein', 'lesplein')->name('lesplein');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});


// ICS

Route::get('/ics/{activity}', [ActivityController::class, 'show']);
Route::get('/calendar/generate.ics', [ActivityController::class, 'generate_ics_feed'])->name('calendar.ics');









require __DIR__.'/settings.php';
