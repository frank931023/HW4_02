<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>註冊使用者列表</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">註冊使用者列表</h2>

    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>Email</th>
                <th>電話</th>
                <th>性向</th>
                <th>偏好內容</th>
                <th>大頭照</th>
                <th>註冊時間</th>
                <th>角色</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->gender }}</td>
                <td>
                    @php
                        // 加入防呆，無論是字串或 array 都可正確處理
                        $prefs = is_array($user->preferences)
                            ? $user->preferences
                            : json_decode($user->preferences ?? '[]', true);
                    @endphp
                    @if (!empty($prefs))
                        @foreach ($prefs as $pref)
                            <span class="badge bg-secondary">{{ $pref }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">無</span>
                    @endif
                </td>
                <td>
                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="頭像" class="rounded" width="60">
                    @else
                        <span class="text-muted">無</span>
                    @endif
                </td>
                <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    {{-- 更新角色 --}}
                    <form method="POST" action="{{ route('update.role', $user->id) }}" class="mb-2">
                        @csrf
                        <div class="input-group input-group-sm">
                            <select name="role" class="form-select">
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="moderator" {{ $user->role == 'moderator' ? 'selected' : '' }}>Moderator</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>

                    {{-- 刪除使用者 --}}
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('你確定要刪除此使用者嗎？')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm w-100">刪除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>