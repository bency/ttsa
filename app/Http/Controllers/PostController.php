<?php

namespace App\Http\Controllers;

use App\Post;

class PostController
{
    public function index()
    {
        $post = Post::where('from_id', '=', '780629588719400')->where('type', '!=', 'event')->orderBy('like_count', 'desc')->paginate(10);
        return response()->json($post);
    }
}
