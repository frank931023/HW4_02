<x-layout title="Page">
    <div class="container mt-4">
        {{-- Tiltle and create post --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">討論區列表</h2>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createPostModal">
                + 新增文章
            </button>
        </div>
        <div class="row">

            {{-- Show posts --}}
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">
                                張貼者：{{ $post->poster->name ?? '未知' }}<br>
                                留言數：{{ $post->comment_count }}
                            </p>
                            {{-- Edit mode --}}
                            @if (request()->get('edit') == $post->id && $post->poster_id === auth()->id())
                                <form method="POST" action="{{ route('post.update', $post->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="title" class="form-label">標題</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="content" class="form-label">內容</label>
                                        <textarea class="form-control" id="content" name="content" rows="4" required>{{ old('content', $post->content) }}</textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">更新貼文</button>
                                    <button type="button" class="btn btn-secondary" onclick="window.history.back();">取消</button>
                                </form>
                            {{-- Edit, Delete,and View Comments buttons --}}
                            @else
                                {{-- Check for user_id and auth --}}
                                @if ($post->poster_id === auth()->id())
                                    <div class="mt-auto">
                                        <div class="d-flex mb-2" class="btn btn-sm btn-warning flex-fill me-1" data-bs-toggle="modal" data-bs-target="#editPostModal"  data-post-id="{{ $post->id }}">
                                            <a href="{{ request()->url() }}?edit={{ $post->id }}" class="btn btn-sm btn-warning flex-fill me-1">
                                                編輯
                                            </a>
                                            <form method="POST" action="{{ route('post.delete', $post->id) }}"
                                                onsubmit="return confirm('你確定要刪除這則貼文嗎？')" class="flex-fill ms-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger w-100">刪除</button>
                                            </form>
                                        </div>
                                        <a href="{{ route('comments.show', $post->id) }}" class="btn btn-primary w-100">查看留言</a>
                                    </div>
                                {{-- Only show view comments --}}
                                @else
                                    <div class="mt-auto">
                                        <a href="{{ route('comments.show', $post->id) }}" class="btn btn-primary w-100">查看留言</a>
                                    </div>
                                @endif
                            @endif
                        </div>                        
                        <div class="card-footer text-muted">
                            留言或貼文更新於：{{ $post->updated_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Paginate for posts --}}
            <div class="mt-3">
                {{ $posts->links() }}
            </div>
        </div>

        <!-- Create Post Modal -->
        <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('post.create', $post->page_id) }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="createPostModalLabel">新增貼文</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="關閉"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">標題</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">內容</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">送出</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- Seesion for announcing action --}}
    @if(session('success'))
        <div class="alert alert-success fixed-bottom m-4 text-center shadow-lg rounded-0" role="alert">
            {{ session('success') }}
        </div>
    @endif
</x-layout>
    