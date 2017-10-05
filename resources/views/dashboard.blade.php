@extends('common.base')
@section('container')
            <h3>按讚數量前十大貼文</h3>
            @foreach($like_posts as $post)
                @if('video' !== $post->type)
                <iframe src="https://www.facebook.com/plugins/post.php?href={{ urlencode($post->permalink_url) }}&width=500" width="500" height="697" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                @else
                <iframe src="https://www.facebook.com/plugins/video.php?href={{ urlencode($post->permalink_url) }}&show_text=1&width=500" width="500" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
                @endif
            @endforeach
@endsection
