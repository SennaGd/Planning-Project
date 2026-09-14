<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;


Route::get('/', [ActivityController::class, 'index'])->name('home');
Route::get('/lesplein', [ActivityController::class, 'index'])->name('lesplein');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});


// ICS

Route::get('/ics/{activity}', [ActivityController::class, 'show']);
Route::post('/calendar/generate.ics', [ActivityController::class, 'generate_ics_feed'])->name('calendar.ics');








require __DIR__.'/settings.php';
