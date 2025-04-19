<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Show posts with page_id
    public function show($page_id)
    {
        $posts = Post::with('poster')->where('page_id', $page_id)->orderBy('updated_at', 'desc')->paginate(9);
        return view('posts', compact('posts'));
    }

    // Create a new post
    public function create(Request $request, $page_id)
    {
        $post = new Post();
        $post->page_id = $page_id;
        // Get login user id or just assume id = 1
        $post->poster_id = auth()->id() ?? 1;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.show', $post->page_id)->with('success', '貼文已更新');
    }

    // Delete post
    public function delete($post_id)
    {
        $post = Post::findOrFail($post_id);

        // auth()->loginUsingId(1);
        $post->poster_id = auth()->id() ?? 1;
        if ($post->poster_id !== auth()->id()) {
            return back()->with('error', '你沒有權限刪除這則留言');
        }

        $post->delete();

        return back()->with('success', '貼文已刪除');
    }

    // Update post
    public function update(Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);

        // auth()->loginUsingId(1);
        $post->poster_id = auth()->id() ?? 1;
        if ($post->poster_id !== auth()->id()) {
            return back()->with('error', '你沒有權限更新這則貼文');
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->updated_at = now();

        $post->save();

        return redirect()->route('posts.show', $post->page_id)->with('success', '貼文已更新');
    }
};