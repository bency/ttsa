<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController
{
    public function index(Request $request)
    {
        $type = $request->input('type', 'video');
        $post = Post::where('from_id', '=', '780629588719400')->where('type', '=', $type)->orderBy('created_time', 'desc')->paginate(10);
        return response()->json($post);
    }
}
