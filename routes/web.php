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

Route::get('/page{page_id}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/page/post{post_id}', [CommentController::class, 'show'])
    ->name('comments.show');

Route::post('/page/post{post_id}/create_comment', [CommentController::class, 'create'])
    // ->middleware('auth')
    ->name('comment.create');

Route::delete('/comments/{comment_id}', [CommentController::class, 'delete'])
    // ->middleware('auth')
    ->name('comment.delete');

Route::put('/comments/{comment_id}', [CommentController::class, 'update'])
    ->middleware('auth')    
    ->name('comment.update');
    

Route::get('/login', function () {
    return view('home');
})->name('login');;