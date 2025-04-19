@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $page->name }}</h1>

    @if ($page->posts->isEmpty())
        <p>目前沒有任何討論區。</p>
    @else
        <ul class="list-group">
            @foreach ($page->posts as $post)
                <li class="list-group-item">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ $post->content }}</p>
                    <!-- 查看更多按鈕導向留言頁面 -->
                    <a href="#" class="btn btn-outline-primary btn-sm">查看更多</a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('pages.pages') }}" class="btn btn-secondary mt-4">← 回到討論版列表</a>
</div>
@endsection
