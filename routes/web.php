<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MemberController;

// 貼文路由
Route::resource('posts', PostController::class);

// 留言路由
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

// 會員路由（如果有的話）
Route::get('members/{member}', [MemberController::class, 'show'])->name('members.show');