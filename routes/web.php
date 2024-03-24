<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ActivityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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


// Route::get('/reservation', [ReservationController::class, 'index']);
// Route::get('/reservation/create', [ReservationController::class, 'create']);
// Route::post('/reservation', [ReservationController::class, 'store']);
// Route::get('/reservation/{id}', [ReservationController::class, 'show']);
// Route::get('/reservation/{id}/edit', [ReservationController::class, 'edit']);
// Route::put('/reservation/{id}', [ReservationController::class, 'update']);
// Route::patch('/reservation/{id}', [ReservationController::class, 'update']);
// Route::delete('/reservation/{id}', [ReservationController::class, 'destroy']);
Route::resource('/reservation', ReservationController::class)->middleware(['auth', 'verified']);

Route::resource('/courses', CourseController::class)->middleware(['auth', 'verified']);

// solo show ?
Route::resource('/activity', ActivityController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
