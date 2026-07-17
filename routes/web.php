<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'home'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
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
    
    // Rute admin untuk kelola berita
    Route::resource('admin/posts', App\Http\Controllers\Admin\PostController::class)->names('admin.posts');
});