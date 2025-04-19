<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>登入</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

{{-- 引入 header --}}
@include('layouts.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="text-center mb-4">登入</h2>

            {{-- 成功訊息（例如註冊成功後導回來） --}}
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- 錯誤訊息（例如帳號密碼錯誤） --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="border p-4 bg-white shadow rounded">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">電子信箱</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="輸入 Email" value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">密碼</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="輸入密碼">
                </div>

                <button type="submit" class="btn btn-primary w-100">登入</button>

                <div class="text-center mt-3">
                    <a href="/register">尚未註冊？點我註冊</a>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
