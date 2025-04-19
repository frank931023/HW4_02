<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

// Home
// 預設 Page 討論版當首頁
Route::get('/', [PageController::class, 'pages'])->name('pages');
Route::get('/pages/{id}', [PageController::class, 'posts'])->name('posts');

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