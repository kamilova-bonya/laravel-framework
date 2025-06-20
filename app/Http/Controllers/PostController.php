<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();

       // $posts = DB::table("posts")->orderBy("id", "desc")->get();


        return view('posts.index', [
            'posts' => $posts
        ]);

    }

    public function show(Post $post)
    {
       // $post = Post::findOrFail($id);

       // $post = DB::table("posts")->find($id);

        return view('posts.show', [
            'post' => $post
        ]);

    }
}
