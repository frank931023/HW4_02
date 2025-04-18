<x-layout title="Page">
    <div class="container mt-4">
        <h2 class="mb-4">討論區列表</h2>
        <div class="row">
            {{-- Multiple posts --}}
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">
                                張貼者：{{ $post->poster->name ?? '未知' }}<br>
                                留言數：{{ $post->comment_count }}
                            </p>
                            <a href="page/post{{ $post['id'] }}" class="btn btn-primary mt-auto">查看內容</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
            <div>{{ $posts->links() }}</div>
        </div>
    </div>
</x-layout>
    