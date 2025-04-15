<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // 儲存留言
    public function store(Request $request, $postId)
    {
        $request->validate([
            'text' => 'required|string|max:1000',
        ]);

        $comment = new Comment([
            'post_id' => $postId,
            'commentor_id' => auth()->id(), // 目前用戶ID
            'text' => $request->text,
        ]);

        $comment->save();

        // 更新帖子留言數量
        $post = Post::findOrFail($postId);
        $post->increment('comment_count');

        return redirect()->route('posts.show', $postId);
    }
}
