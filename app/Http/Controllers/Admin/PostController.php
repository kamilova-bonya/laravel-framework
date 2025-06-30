<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->paginate(5);

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

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        try {
            $validated['user_id'] = auth()->id();

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')
                    ->store('posts', 'public');
            }

            $post = Post::create($validated);
        } catch (\Exception $exception) {
            return back()->with('error', 'Ошибка: ' . $exception->getMessage());
        }

        return redirect()->route('posts.show', $post)
            ->with('success', 'Пост добавлен!');
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
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:5|max:20000',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        try {
            if ($request->has('remove_image') && $post->image) {
                Storage::delete($post->image);
                $validated['image'] = null;
            }

            if ($request->hasFile('image')) {
                if ($post->image) {
                    Storage::delete($post->image);
                }
                $validated['image'] = $request->file('image')
                    ->store('posts', 'public');
            }

            $post->update($validated);

        } catch (\Exception $exception) {
            return redirect()->route('admin.posts.edit', $post)
                ->with('error', 'Ошибка обновления поста! ' . $exception->getMessage());
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Пост обновлен!');
    }

    public function destroy(Post $post)
    {
        try {

            if ($post->image) {
                Storage::delete($post->image);
            }

            $post->delete();
            return redirect()->route('admin.posts.index')
                ->with('success', 'Пост успешно удалён!');
        } catch (\Exception $exception) {
            return redirect()->route('admin.posts.index')
                ->with('error', 'Ошибка удаления поста: ' . $exception->getMessage());
        }
    }
}
