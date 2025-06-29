<?php

namespace Database\Seeders;

use App\Models\Category;
<<<<<<< HEAD
use App\Models\User;
=======
>>>>>>> b72420539c83ec3c7c874ed3047368a0a558a994
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => fake()->realText(10),
                'content' => fake()->realText(1000),
                'category_id' => Category::query()->inRandomOrder()->first()->id,
<<<<<<< HEAD
                'user_id' => User::query()->inRandomOrder()->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
=======
>>>>>>> b72420539c83ec3c7c874ed3047368a0a558a994
            ]);
        }
    }
}
