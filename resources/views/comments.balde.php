    <div>
        <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
        <p>發帖人：{{ $post->poster->name }}</p>
        <p>留言數：{{ $post->comment_count }}</p>
    </div>