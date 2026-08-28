<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;


Route::view('/', 'welcome')->name('home');

Route::get('/ics/{activity}', [ActivityController::class, 'show']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
