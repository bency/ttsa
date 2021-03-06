<?php

namespace App\Http\Controllers;

use App\QA;
use App\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function dashboard()
    {
        $like_posts = Post::where('from_id', '=', '780629588719400')->where('type', '!=', 'event')->orderBy('like_count', 'desc')->paginate(10);
        return view('dashboard', ['like_posts' => $like_posts]);
    }

    public function home()
    {
        return view('home');
    }
}
