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

    // Show comments with post_id
    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        $comments = Comment::with('commentor')->where('post_id', $post_id)->orderBy('updated_at', 'desc')->paginate(9);
        return view('comments', compact('comments' ,'post'));
    }

    // Create a new comment
    public function create(Request $request, $post_id)
    {
        $request->validate([
            'text' => 'required|string|max:500',
        ]);

        $comment = new Comment();
        // auth()->loginUsingId(1);
        $comment->commentor_id = auth()->id() ?? 1;
        $comment->text = $request->input('text');
        $comment->post_id = $post_id;
        $comment->save();
        // Update comment_count
        $comment->post->increment('comment_count');
        // Update mvp_talker
        $this->updateMvpTalker($comment->post->id);

        return redirect()->route('comments.show', $comment->post_id)->with('success', '留言已更新');
    }

    // Delete comment
    public function delete($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);

        // auth()->loginUsingId(1);
        auth()->id() ?? 1;
        if ($comment->commentor_id !== auth()->id()) {
            return back()->with('error', '你沒有權限刪除這則留言');
        }

        $comment->delete();

        // Update comment_count
        $comment->post->decrement('comment_count');
        // Update mvp_talker
        $this->updateMvpTalker($comment->post->id);

        return back()->with('success', '留言已刪除');
    }

    // Update comment
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

    // Update mvp_talker_id
    private function updateMvpTalker($post_id)
    {
        // Count users' comments
        $topCommenter = Comment::where('post_id', $post_id)
                                ->selectRaw('commentor_id, count(*) as comment_count')
                                ->groupBy('commentor_id')
                                ->orderByDesc('comment_count')
                                ->first();

        // Update mvp_talker in posts table
        if ($topCommenter) {
            $post = Post::findOrFail($post_id);
            $post->mvp_talker_id = $topCommenter->commentor_id;
            $post->save();
        }
    }
};