<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IcsController;
use App\Http\Controllers\QrController;

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
Route::patch('/updateActivity', [ActivityController::class, 'update'])->name('updateActivity');

// adding account
Route::post("/add/account", [UserController::class, "add"])->name("add.account");

// ICS
Route::post('/calendar/handle.request', [IcsController::class, 'handle_request'])
    ->name('calendar.handle_request');

Route::get('/ics/{activity}', [ActivityController::class, 'show']);
Route::get('/calendar/generate.ics', [ActivityController::class, 'generate_ics_feed'])->name('calendar.ics');
Route::get('/calendar/subscribe', [IcsController::class, 'generate_ics_contents'])
    ->name('calendar.subscribe');
// QR CODE


require __DIR__.'/settings.php';
