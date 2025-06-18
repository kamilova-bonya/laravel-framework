<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        //$posts = Post::all();

        $posts = DB::table("posts")->orderBy("id", "desc")->get();


        return view('posts.index', [
            'posts' => $posts
        ]);

    }

    public function show($id)
    {
        //$post = Post::find($id);

        $post = DB::table("posts")->find($id);

        if ($post === null) {
            abort(404);
        }

        return view('posts.show', [
            'post' => $post
        ]);

    }
}
