<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\IcsController;
use App\Http\Controllers\QrController;

Route::get('/', [ActivityController::class, 'index'])->name('home');
Route::get('/lesplein', [ActivityController::class, 'index'])->name('lesplein');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});


// ICS
Route::post('/calendar/handle.request', [IcsController::class, 'handle_request'])
    ->name('calendar.handle_request');

Route::get('/calendar/subscribe', [IcsController::class, 'generate_ics_contents'])
    ->name('calendar.subscribe');
// QR CODE


require __DIR__.'/settings.php';
