<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>大便大便大大便</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    {{-- ✨ 這裡加入 header --}}
    @include('layouts.header')

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
