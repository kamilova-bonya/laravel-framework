<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postIds = Post::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        foreach ($postIds as $postId) {
            $commentCount = rand(1, 3);

            Comment::factory()
                ->count($commentCount)
                ->create([
                    'post_id' => $postId,
                    'user_id' => function() use ($userIds) {
                        return $userIds[array_rand($userIds)];
                    }
                ]);
        }
    }
}
