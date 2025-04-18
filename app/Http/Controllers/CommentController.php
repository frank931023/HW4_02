<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Show comments from specific post
    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        // $comments = Comment::with('commentor')->paginate(9);
        $comments = Comment::with('commentor')->where('post_id', $post_id)->orderBy('created_at', 'desc')->paginate(9);
        return view('comments', compact('comments' ,'post'));
    }

    // 儲存留言
    public function create_comment(Request $request, $post_id)
    {
        // dd(request()->all());
        $request->validate([
            'text' => 'required|string|max:500',
        ]);

        // // 建立留言
        $comment = new Comment();
        $comment->text = $request->input('text');
        $comment->post_id = $post_id;
        // $comment->commentor_id = auth()->id();
        auth()->loginUsingId(1);
        $comment->commentor_id = auth()->id();// Assume Id = 1
        $comment->save();

        // 重定向回該文章頁面
        return back()->with('success', '留言已成功送出！');
    }
};