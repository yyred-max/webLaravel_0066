<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/posts', PostController::class);
Route::get('/kategori/{category:slug}', [PostController::class, 'byCategory'])->name('category.show');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])->name('newsletter.subscribe');

// Halaman register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Halaman yang butuh login (protected)
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
});