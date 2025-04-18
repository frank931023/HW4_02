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
        $comments = Comment::with('commentor')->where('post_id', $post_id)->orderBy('updated_at', 'desc')->paginate(9);
        return view('comments', compact('comments' ,'post'));
    }

    // 儲存留言
    public function create(Request $request, $post_id)
    {
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

        $comment->post->increment('comment_count');

        $this->updateMvpTalker($comment->post->id);

        // 重定向回該文章頁面
        return back()->with('success', '留言已成功送出！');
    }

    public function delete($comment_id)
    {
        // 找到留言
        $comment = Comment::findOrFail($comment_id);

        // 確認是否為本人刪除（或你也可以放開限制）
        auth()->loginUsingId(1); // fake for id 1
        if ($comment->commentor_id !== auth()->id()) {
            return back()->with('error', '你沒有權限刪除這則留言');
        }

        // 刪除留言
        $comment->delete();

        // 更新文章的 comment_count (-1)
        $comment->post->decrement('comment_count');

        // 更新該文章的 MVP 發言者
        $this->updateMvpTalker($comment->post->id);

        // 回傳成功訊息
        return back()->with('success', '留言已刪除');
    }

    public function update(Request $request, $comment_id)
    {
        $request->validate([
            'text' => 'required|string|max:500',
        ]);

        $comment = Comment::findOrFail($comment_id);

        auth()->loginUsingId(1); // fake for id 1
        if ($comment->commentor_id !== auth()->id()) {
            return back()->with('error', '你不能編輯這則留言');
        }

        $comment->text = $request->text;
        $comment->updated_at = now();
        $comment->save();

        return redirect()->route('comments.show', $comment->post_id)->with('success', '留言已更新');
    }

    private function updateMvpTalker($post_id)
    {
        // 計算每個使用者在該文章下的留言數量
        $topCommenter = Comment::where('post_id', $post_id)
                                ->selectRaw('commentor_id, count(*) as comment_count')
                                ->groupBy('commentor_id')
                                ->orderByDesc('comment_count')
                                ->first();

        // 如果找到發言次數最多的使用者，更新文章的 MVP
        if ($topCommenter) {
            $post = Post::findOrFail($post_id);
            $post->mvp_talker_id = $topCommenter->commentor_id;
            $post->save();
        }
    }
};