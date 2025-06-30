<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        $this->authorize('create', Comment::class);
        return view('comments.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'post_id' => 'required|exists:posts,id'
        ]);

        try {
            $comment = Comment::create([
                'content' => $validated['content'],
                'post_id' => $validated['post_id'],
                'user_id' => auth()->id()
            ]);

            return redirect()
                ->route('posts.show', $comment->post)
                ->with('success', 'Комментарий добавлен');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', 'Ошибка добавления комментария: ' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $comment->load('user', 'post');
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $validated = $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        try {
            $comment->update($validated);

            return redirect()
                ->route('posts.show', $comment->post)
                ->with('success', 'Комментарий обновлен');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', 'Ошибка обновления комментария: ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        try {
            $post = $comment->post;
            $comment->delete();

            return redirect()
                ->route('posts.show', $post)
                ->with('success', 'Комментарий удален');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', 'Ошибка удаления комментария: ' . $exception->getMessage());
        }
    }
}
