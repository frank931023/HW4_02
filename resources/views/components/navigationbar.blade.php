{{-- navigation bar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">留言板系統</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="">所有版面</a>
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
    </div>
</nav>