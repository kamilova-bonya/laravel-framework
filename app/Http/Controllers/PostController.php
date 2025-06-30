<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function addLike(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->increment('likes');

            return response()->json([
                'success' => true,
                'message' => 'Like successfully added',
                'likes' => $post->likes,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
            ], 404);
        }
    }

    public function index()
    {
        $posts = Post::with('category')->paginate(5);

       // $posts = DB::table("posts")->orderBy("id", "desc")->get();


        return view('posts.index', [
            'posts' => $posts
        ]);

    }

    public function show(Post $post)
    {
       // $post = Post::findOrFail($id);

       // $post = DB::table("posts")->find($id);

        $post->load(['comments.user', 'category']);

        return view('posts.show', [
            'post' => $post
        ]);

    }
}
