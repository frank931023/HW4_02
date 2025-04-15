<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


// Route::get('/', function () {
//     return view('posts', [
//         'posts' => Post::all()
//     ]);
// });

Route::get('/', [PostController::class, 'show']);