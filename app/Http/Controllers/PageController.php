<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;

class PageController extends Controller
{
    // 顯示所有討論版
    public function pages()
    {
        $pages = Page::all();
        return view('pages.pages', compact('pages'));
    }

    // 顯示單一討論版底下的討論區
    public function posts($id)
    {
        $page = Page::with('posts')->findOrFail($id);
        return view('pages.posts', compact('page'));
    }
}
