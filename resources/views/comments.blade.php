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
                    <strong>{{ $comment->commentor->name ?? '匿名' }}</strong><br>
                    {{ $comment->text }}<br>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
            
        </ul>
        <div>{{ $comments->links() }}</div>
        
        {{-- Create comment --}}
        <div class="mb-4">
            <form method="POST" action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment">新增留言</label>
                    <textarea name="text" id="comment" class="form-control" rows="3" placeholder="填寫留言" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">送出留言</button>
            </form>
        </div>

        {{-- Return posts list --}}
        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">返回上一頁</a>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

</x-layout>