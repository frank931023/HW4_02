@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>更改密碼</h3>

    @if (session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.change') }}">
        @csrf
        <div class="mb-3">
            <label for="current_password" class="form-label">目前密碼</label>
            <input type="password" name="current_password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">新密碼</label>
            <input type="password" name="new_password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">確認新密碼</label>
            <input type="password" name="new_password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">更新密碼</button>
    </form>
</div>
@endsection
