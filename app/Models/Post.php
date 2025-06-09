<?php

namespace App\Models;

class Post
{
    public function all(): array
    {
        return [
            1 => [
                'id' => 1,
                'title' => 'First Post',
                'content' => 'First Post'
            ],
            2 => [
                'id' => 2,
                'title' => 'Second Post',
                'content' => 'Second Post'
            ],
        ];
    }

    public function find($id): ?array
    {
        $posts = $this::all();
        return $posts[$id] ?? null;
    }
}
