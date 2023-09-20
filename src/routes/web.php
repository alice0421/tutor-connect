<?php

use App\Http\Controllers\TeacherProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MatchingController;
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

// 仮置き
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('users.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/teachers/dashboard', function () {
    return view('teachers.dashboard');
})->middleware(['auth:teacher'])->name('teacher.dashboard');


// usersだけが見れるプロフィール（編集・削除権限）
Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});
// teachersだけが見れるプロフィール（編集・削除権限）
Route::middleware('auth:teacher')->controller(TeacherProfileController::class)->prefix('teachers')->name('teacher.')->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});


// usersだけが見れる先生とのマッチング
Route::middleware('auth')->controller(MatchingController::class)->group(function () {
    Route::get('/matching', 'index')->name('matching');
});


// usersの認証系のルーティング
require __DIR__.'/auth.php';
// teachersの認証系のルーティング
Route::prefix('teachers')->name('teacher.')->group(function () {
    require __DIR__.'/auth_teacher.php';
});
