<x-layout title="Home">
    <div class="container">
        <h1 class="mb-4">討論版列表</h1>
    
        <!-- checkbox filter -->
        <form method="GET" action="{{ route('pages.pages') }}" class="mb-4">
            <div class="d-flex flex-wrap align-items-center gap-2">
                @foreach ($allTags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                            type="checkbox"
                            name="tags[]"
                            value="{{ $tag }}"
                            id="tag_{{ $tag }}"
                            {{ in_array($tag, $selectedTags) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tag_{{ $tag }}">{{ $tag }}</label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary btn-sm ms-3">篩選</button>
                <a href="{{ route('pages.pages') }}" class="btn btn-outline-secondary btn-sm ms-2">清除</a>
            </div>
        </form>
    
        <div class="row">
            @foreach ($pages as $page)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $page->name }}</h5>
                        <p class="card-text text-muted" style="flex-grow: 1;">
                            {{ $page->description ?? '這個討論版還沒有簡介喔～' }}
                        </p>
    
                        <!-- 顯示 tags -->
                        <div class="mb-2">
                            @if (!empty($page->tags))
                                @foreach ($page->tags as $tag)
                                    <span class="badge bg-light text-dark border rounded-pill me-1">#{{ $tag }}</span>
                                @endforeach
                            @endif
                        </div>
    
                        <a href="{{ route('pages.posts', $page->id) }}" class="btn btn-outline-primary mt-auto">
                            🔎 查看討論區
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>