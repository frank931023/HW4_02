{{-- resources/views/components/user-function.blade.php --}}
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
                    <img src="https://cdn-icons-png.flaticon.com/512/9187/9187604.png" alt="無頭像" class="rounded-circle me-2" width="40" height="40">
                    {{-- <img src="{{ asset('images/user.png') }}" alt="無頭像" class="rounded-circle me-2" width="40" height="40"> --}}
                @endif
                {{-- 使用者名稱 --}}
                <span class="fw-semibold">{{ Auth::user()->name }}</span>
            </a>
            {{-- 下拉選單內容 --}}
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ route('profile') }}">👤 個人檔案</a></li>
                <li><a class="dropdown-item" href="{{ route('password.change') }}">🔒 更改密碼</a></li>
                <li><a class="dropdown-item" href="https://www.youtube.com/watch?v=fHZMoMtnmGo" target="_blank">⚙️ 我的設定</a></li>
                
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