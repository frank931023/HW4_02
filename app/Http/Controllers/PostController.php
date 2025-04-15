<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 顯示所有帖子
    public function index()
    {
        $posts = Post::all(); // 或者你可以加上排序/分頁邏輯
        return view('posts.index', compact('posts'));
    }

    // 顯示單一帖子及其留言
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('posts.show', compact('post', 'comments'));
    }

    // 創建新帖子（表單顯示）
    public function create()
    {
        return view('posts.create');
    }

    // 儲存新帖子
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        Post::create([
            'title' => $request->title,
            'class_id' => $request->class_id,
            'poster_id' => auth()->id(), // 目前用戶ID
        ]);

        return redirect()->route('posts.index');
    }
}