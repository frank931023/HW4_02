<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Post;

class PostController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Show all posts
    public function show($page_id)
    {
        // $posts = Post::all();
        // $posts = Post::with('poster')->orderBy('created_at', 'desc')->paginate(9);
        $posts = Post::where('page_id', $page_id)->orderBy('created_at', 'desc')->paginate(9);
        return view('posts', compact('posts'));
    }
};