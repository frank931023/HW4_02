{{-- navigation bar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">SD論壇</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.show', ['page_id' => 21]) }}">21號留言板</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('comments.show', ['post_id' => 11]) }}">11號討論區</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">會員資料</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">會員擁有留言</a>
                </li>
            </ul>
        </div>
        <!-- 使用者圖示 -->
        <a href="#" class="nav-icon">
            <img src="https://cdn-icons-png.flaticon.com/512/9187/9187604.png" alt="User" class="rounded-circle" style="width: 32px; height: 32px;">
        </a>
        {{-- 右側功能區 --}}
        <div class="d-flex align-items-center">
            @guest
                {{-- 未登入：登入與註冊按鈕 --}}
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">登入</a>
                <a href="{{ route('register') }}" class="btn btn-primary">註冊</a>
            @else
                {{-- 已登入：使用者大頭照與下拉選單 --}}
                <div class="dropdown">
                    <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- 頭像 --}}
                        @if (Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="頭像" class="rounded-circle me-2" width="40" height="40">
                        @else
                            <img src="{{ asset('images/user.png') }}" alt="無頭像" class="rounded-circle me-2" width="40" height="40">
                        @endif

                        {{-- 使用者名稱 --}}
                        <span class="fw-semibold">{{ Auth::user()->name }}</span>
                    </a>

                    {{-- 下拉選單內容 --}}
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">👤 個人檔案</a></li>
                        <li><a class="dropdown-item" href="{{ route('password.change') }}">🔒 更改密碼</a></li>
                        <li><a class="dropdown-item" href="https://www.youtube.com/watch?v=fHZMoMtnmGo" target="_blank">⚙️ 我的設定</a></li>
                        
                        {{-- 只有 admin 角色的使用者能看到「使用者清單」 --}}
                        @if (auth()->user()->role === 'admin')
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">📝 使用者清單</a></li>
                        @endif
                        
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">🚪 登出</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</nav>