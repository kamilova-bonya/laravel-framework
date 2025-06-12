<?php
namespace App\Models;

class Post
{
    public static function all(): ?array
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

    public static function find(int $id): ?array
    {
        return static::all()[$id] ?? null;
    }
}
