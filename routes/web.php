<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use \App\Http\Controllers\SchoolClassController;


Route::get('/', [ActivityController::class, 'index'])->name('home');
Route::get('/lesplein', [ActivityController::class, 'index'])->name('lesplein');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ActivityController::class, 'dashboard'])->name('dashboard');
});
//Route::middleware(['auth', 'verified'])->group(function () {
    route::post('/storeLesson', [ActivityController::class, 'store'])->name('storeLesson');
//});

//Route::middleware(['auth', 'verified'])->group(function () {
route::post('/storeSchoolClass', [SchoolClassController::class, 'store'])->name('storeSchoolClass');
//});
route::patch('/editSchoolClass', [SchoolClassController::class, 'update'])->name('editSchoolClass');

// ICS

Route::get('/ics/{activity}', [ActivityController::class, 'show']);
Route::get('/calendar/generate.ics', [ActivityController::class, 'generate_ics_feed'])->name('calendar.ics');









require __DIR__.'/settings.php';
