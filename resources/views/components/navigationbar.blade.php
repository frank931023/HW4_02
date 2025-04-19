{{-- navigation bar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        {{-- 左側 LOGO --}}
        <a class="navbar-brand" href="/">SD論壇</a>

        {{-- 手機版漢堡按鈕 --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- 導覽內容 --}}
        <div class="collapse navbar-collapse" id="navbarContent">
            <div class="d-flex justify-content-between align-items-center w-100">
                {{-- 左邊導覽列 --}}
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages') }}">Home</a>
                    </li>
                </ul>

                {{-- 右邊 user-menu --}}
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <x-user-menu />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
