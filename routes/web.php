<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return "Welcome to your dashboard!";
//     });
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
});



Route::get('/dashboard', [PostController::class, 'index'])->middleware('auth');





Route::get('/', function () {
    return view('welcome');
});
