<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('dashboard');
});

// 註冊
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// 登入
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// 登出
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/users', [AuthController::class, 'showUsers'])->middleware(['auth', 'can:isAdmin'])->name('users.index');
Route::get('/users', [AuthController::class, 'showUsers'])->name('users.index');
Route::post('/users/{id}/role', [AuthController::class, 'updateRole'])->name('update.role');
Route::delete('/users/{id}', [AuthController::class, 'destroy'])->name('users.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile']);

    Route::get('/change-password', [AuthController::class, 'showChangePassword'])->name('password.change');
    Route::post('/change-password', [AuthController::class, 'updatePassword']);
});

