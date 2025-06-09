<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        $posts = (new Post())->all();

        return view('posts', [
            'posts' => $posts
        ]);

    }

    public function show($id)
    {
        $post = (new Post())->find($id);
        if (!$post) {
            abort(404);
        }
        return view('post', [
            'post' => $post
        ]);
    }
}
