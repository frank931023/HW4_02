<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/pages', [PageController::class, 'pages'])->name('pages.pages');
Route::get('/pages/{id}', [PageController::class, 'posts'])->name('pages.posts');
