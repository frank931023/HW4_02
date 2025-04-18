<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     return view('posts', [
//         'posts' => Post::all()
//     ]);
// });
Route::get('/', function(){
    return view('home');
});

Route::get('/page{page_id}', [PostController::class, 'show']);

Route::get('/page/post{post_id}', [CommentController::class, 'show']);

// 新增留言
Route::post('/page/post{post_id}/create_comment', function($post_id) {

    dd($post_id, request()->all());
})->name('comments.store');

Route::post('/page/post{post_id}/create_comment', [CommentController::class, 'create_comment'])
    // ->middleware('auth')
    ->name('comments.store');

Route::get('/login', function () {
    return view('home');
})->name('login');;