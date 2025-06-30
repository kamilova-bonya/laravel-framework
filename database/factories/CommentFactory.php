<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'content' => $this->faker->realText(200),
            'post_id' => Post::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'created_at' => $this->faker->dateTimeBetween('-1 months', 'now'),
        ];
    }
}
