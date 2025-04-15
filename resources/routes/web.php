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

// use Illuminate\Support\Facades\Route;
// use App\Models\Job;

// Route::get('/', function () {
//     return view('home', [
//         "name" => "Thanatos",
//     ]);
// });

// Route::get('/about', function () {
//     return view("about");
// });

// Route::get('/contact', function () {
//     return view("contact");
// });

// Route::get("/jobs", function () {
//     return view('jobs', [
//         "jobs" => Job::all()
//     ]);
// });

// Route::get("/jobs/{id}", function($id) {
//     $job = Job::find($id);
//     // dd($job);
//     return view("job", ["job" => $job]);
// });