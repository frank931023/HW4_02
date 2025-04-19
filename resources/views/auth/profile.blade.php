<x-layout title="個人檔案設定">
    <div class="container mt-5">
        <h3 class="mb-4">個人檔案設定</h3>
    
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    
        <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
            @csrf
    
            <div class="row mb-4">
                {{-- 大頭照預覽與上傳 --}}
                @php
                    $defaultAvatar = asset('images/user.png'); // 你原本設定的預設大頭照路徑
                @endphp
    
                <div class="col-md-3 text-center">
                    <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : $defaultAvatar }}" 
                         alt="頭像" 
                         class="rounded-circle mb-2" 
                         width="150" height="150">
                    <div>
                        <input type="file" name="avatar" class="form-control mt-2">
                    </div>
                </div>
    
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="name" class="form-label">姓名</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
                    </div>
    
                    <div class="mb-3">
                        <label for="email" class="form-label">信箱（不可更改）</label>
                        <input type="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
                    </div>
    
                    <div class="mb-3">
                        <label for="phone" class="form-label">電話</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', auth()->user()->phone) }}">
                    </div>
    
                    <div class="mb-3">
                        <label class="form-label">角色</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->role }}" disabled>
                    </div>
    
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">💾 更新個人檔案</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layout>