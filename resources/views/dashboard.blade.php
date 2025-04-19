@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @auth
            <h2 class="mb-4">歡迎，{{ auth()->user()->name }}</h2>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">登出</button>
            </form>
        @endauth

        @guest
            <h2 class="mb-4">請先登入</h2>
            <a href="{{ route('login') }}" class="btn btn-primary">登入</a>
        @endguest
    </div>
@endsection

