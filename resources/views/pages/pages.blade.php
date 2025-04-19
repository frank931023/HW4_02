@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">討論版列表</h1>
    <div class="row">
        @foreach ($pages as $page)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $page->name }}</h5>
                    <p class="card-text text-muted" style="flex-grow: 1;">
                        {{ $page->description ?? '這個討論版還沒有簡介喔～' }}
                    </p>
                    <a href="{{ route('pages.posts', $page->id) }}" class="btn btn-outline-primary mt-auto">
                        🔎 查看討論區
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
