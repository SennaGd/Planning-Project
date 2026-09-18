<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SchoolClassController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ActivityController::class, 'index'])->name('home');
Route::get('/lesplein', [ActivityController::class, 'index'])->name('lesplein');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ActivityController::class, 'dashboard'])->name('dashboard');
});
// Route::middleware(['auth', 'verified'])->group(function () {
Route::post('/storeLesson', [ActivityController::class, 'store'])->name('storeLesson');
// });

// Route::middleware(['auth', 'verified'])->group(function () {
Route::post('/storeSchoolClass', [SchoolClassController::class, 'store'])->name('storeSchoolClass');
// });
Route::patch('/editSchoolClass', [SchoolClassController::class, 'update'])->name('editSchoolClass');
Route::delete('/deleteSchoolClass', [SchoolClassController::class, 'destroy'])->name('deleteSchoolClass');

// ICS

Route::get('/ics/{activity}', [ActivityController::class, 'show']);
Route::get('/calendar/generate.ics', [ActivityController::class, 'generate_ics_feed'])->name('calendar.ics');

require __DIR__.'/settings.php';
