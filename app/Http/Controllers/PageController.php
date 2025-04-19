<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;

class PageController extends Controller
{
    // 顯示討論版
    public function pages(Request $request)
    {
        $selectedTags = $request->input('tags', []);

        // tag 不為空才進行篩選
        $pages = Page::when(!empty($selectedTags), function ($query) use ($selectedTags) {
            $query->where(function ($q) use ($selectedTags) {
                foreach ($selectedTags as $tag) {
                    $q->orWhereJsonContains('tags', $tag);
                }
            });
        })->get();

        // 所有 tag
        $allTags = collect([
            '健康', '生活', '休閒', '娛樂', '時事', '八卦'
        ]);

        return view('pages.pages', compact('pages', 'allTags', 'selectedTags'));
    }

    // 顯示單一討論版底下的討論區
    public function posts($id)
    {
        $page = Page::with('posts')->findOrFail($id);
        return view('pages.posts', compact('page'));
    }
}
