<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>註冊</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

{{-- 引入 header --}}
@include('layouts.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="text-center mb-4">註冊</h2>

            {{-- 顯示成功訊息 --}}
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- 顯示錯誤訊息 --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="border p-4 bg-white shadow rounded">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">姓名</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="輸入姓名" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">電子信箱</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="輸入 Email" value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">電話</label>
                    <input name="phone" id="phone" type="text" class="form-control" placeholder="輸入電話" value="{{ old('phone') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">性向</label>
                    <select name="gender" class="form-select">
                        <option value="男生" {{ old('gender') == '男生' ? 'selected' : '' }}>男生</option>
                        <option value="女生" {{ old('gender') == '女生' ? 'selected' : '' }}>女生</option>
                        <option value="我的性向是汽車" {{ old('gender') == '我的性向是汽車' ? 'selected' : '' }}>我的性向是汽車</option>
                        <option value="不要問我" {{ old('gender') == '不要問我' ? 'selected' : '' }}>不要問我</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">偏好內容</label>
                    <div>
                        @foreach(['中央大學', '賴清德', 'NBA', '大罵免', '張員瑛', '川普', '作弊', '美妝', '小中大電視台', '洪永結'] as $preference)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="preferences[]" value="{{ $preference }}" {{ in_array($preference, old('preferences', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $preference }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="avatar" class="form-label">大頭照</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">密碼</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="設定密碼">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">確認密碼</label>
                    <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="確認密碼">
                </div>

                <button type="submit" class="btn btn-primary w-100">註冊</button>

                <div class="text-center mt-3">
                    <a href="/login">已有帳號？點我登入</a>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
