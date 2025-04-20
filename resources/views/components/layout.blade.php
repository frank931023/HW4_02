<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '討論區系統' }}</title>
    {{-- Loading boostrap5 CSS --}}
    @vite(['resources/css/app.css'])
    
</head>
<body>
    {{-- navigation bar --}}
    <x-navigationbar />

    {{-- content --}}
    <main class="container mt-4" style="min-height: 80vh;">
        {{ $slot }}
    </main>
    {{-- footer --}}
    <x-footer />
    {{-- Loading boostrap5 JS --}}
    @vite(['resources/js/app.js'])
</body>
</html>