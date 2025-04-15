<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


// Route::get('/', function () {
//     return view('posts', [
//         'posts' => Post::all()
//     ]);
// });

Route::get('/{page_id}', [PostController::class, 'show']);

Route::get('/{page_id}/{post_id}', [CommentController::class, 'show'])->name('comment.show');;