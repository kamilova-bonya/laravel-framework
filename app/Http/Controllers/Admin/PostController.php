<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create',
            [
                'categories' => $categories
            ]
        );
    }

    public function store(Request $request)
    {
/*        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = 1;
        $post->save();*/

/*        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => 2,
        ]);*/

        Post::create($request->all());

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit',
            [
                'categories' => $categories,
                'post' => $post
            ]
        );
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
