<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

// 預設首頁顯示討論版列表 (測試用)
Route::get('/', [PageController::class, 'pages'])->name('home');

// Page 討論版列表頁面（merge用）
Route::get('/pages', [PageController::class, 'pages'])->name('pages.pages');

// Post 討論區列表頁面
Route::get('/pages/{id}', [PageController::class, 'posts'])->name('pages.posts');
