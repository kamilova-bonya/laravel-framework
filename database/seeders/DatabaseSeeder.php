<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> b72420539c83ec3c7c874ed3047368a0a558a994

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'password' => bcrypt('123456'),
            'is_admin' => true,
        ]);
=======
>>>>>>> b72420539c83ec3c7c874ed3047368a0a558a994

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
<<<<<<< HEAD
            CommentSeeder::class,
        ]);
=======
        ]);

        // User::factory(10)->create();

/*        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
>>>>>>> b72420539c83ec3c7c874ed3047368a0a558a994
    }
}
