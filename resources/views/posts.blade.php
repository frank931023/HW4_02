<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">討論區列表</h2>
    
        <div class="row">
            {{-- 模擬多個 post 資料 --}}
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">
                                張貼者：{{ $post->poster->name ?? '未知' }}<br>
                                留言數：{{ $post->comment_count }}
                            </p>
                            <a href="#" class="btn btn-primary">查看內容</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>