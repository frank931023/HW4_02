<x-layout title="{{$post->title}}"> 
    <div class="container mt-4">
        {{-- Post title --}}
        <h2 class="mb-4">《{{ $post->title }}》</h2>

        {{-- Post content --}}
        <div class="mb-4 p-3 border rounded">
            <h4>{{ $post->title }}</h4>
            <p class="mb-1">
                {{ $post->content }}
            </p>
            <small class="text-muted">
                張貼者：{{ $post->poster->name ?? '匿名' }} ｜ {{ $post->created_at->diffForHumans() }}
            </small>
        </div>

        {{-- Comments list --}}
        <ul class="list-group">
            @foreach ($comments as $comment)
                <li class="list-group-item">
                    <div class="break-word">
                        <strong>{{ $comment->commentor->name ?? '匿名' }}</strong><br>
                        {{ $comment->text }}<br>
                    </div>
                    {{-- <small class="text-muted">created: {{ $comment->created_at->diffForHumans() }}</small> --}}
                    {{-- <br> --}}
                    <small class="text-muted">updated: {{ $comment->updated_at->diffForHumans() }}</small>
                    @if (request()->get('edit') == $comment->id && $comment->commentor_id === 1)
                        <form method="POST" action="{{ route('comment.update', $comment->id) }}">
                            @csrf
                            @method('PUT')
                            <textarea name="text" class="form-control mb-2" rows="2" required>{{ old('text', $comment->text) }}</textarea>
                            <button type="submit" class="btn btn-sm btn-primary">儲存</button>
                            <a href="{{ url()->current() }}" class="btn btn-sm btn-secondary">取消</a>
                        </form>
                    @else
                        @if ($comment->commentor_id === 1)
                            <div class="d-flex align-items-center gap-2 mt-2">
                                <a href="{{ request()->url() }}?edit={{ $comment->id }}" class="btn btn-sm btn-warning">編輯</a>
                        
                                <form method="POST" action="{{ route('comment.delete', $comment->id) }}"
                                    onsubmit="return confirm('你確定要刪除這則留言嗎？')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">刪除</button>
                                </form>
                            </div>
                        @endif    
                    @endif
                </li>
            @endforeach
        </ul>
        <div>{{ $comments->links() }}</div>
        
        {{-- Create comment --}}
        <div class="mb-4">
            <form method="POST" action="{{ route('comment.create', $post->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment">新增留言</label>
                    <textarea name="text" id="comment" class="form-control" rows="3" placeholder="填寫留言" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">送出留言</button>
            </form>
        </div>
    </div>
    {{-- Return posts list --}}
    <div class="fixed-bottom m-2">
        <a href="{{ route('posts.show', $post->page_id) }}" class="btn btn-secondary">返回討論版</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success fixed-bottom m-4" role="alert">
        {{ session('success') }}
    </div>
    @endif
</x-layout>