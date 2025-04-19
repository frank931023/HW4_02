<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Home
Route::get('/', function(){
    return view('home');
});

// Post
Route::get('/page/{page_id}', [PostController::class, 'show']) 
    ->name('posts.show');
Route::post('/page/{page_id}/create_post', [PostController::class, 'create'])
    ->middleware('auth')    
    ->name('post.create');
Route::delete('/post/{post_id}', [PostController::class, 'delete'])
    ->middleware('auth')
    ->name('post.delete');
Route::put('/post/{post_id}', [PostController::class, 'update'])
    ->middleware('auth')
    ->name('post.update');

// Comment
Route::get('/page/post/{post_id}', [CommentController::class, 'show'])
    ->name('comments.show');
Route::post('/page/post/{post_id}/create_comment', [CommentController::class, 'create'])
    ->middleware('auth')
    ->name('comment.create');
Route::delete('/comments/{comment_id}', [CommentController::class, 'delete'])
    ->middleware('auth')
    ->name('comment.delete');
Route::put('/comments/{comment_id}', [CommentController::class, 'update'])
    ->middleware('auth')    
    ->name('comment.update');
    
// Login
Route::get('/login', function () {
    return view('home');
})->name('login');;