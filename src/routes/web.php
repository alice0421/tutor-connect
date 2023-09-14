<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('/teachers/dashboard', function () {
    return view('teachers.dashboard');
})->middleware(['auth:teacher'])->name('teacher.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth:teacher')->prefix('teachers')->name('teacher.')->group(function () {
    Route::get('/profile', [TeacherProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [TeacherProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [TeacherProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('teachers')->name('teacher.')->group(function () {
    require __DIR__.'/auth_teacher.php';
});
