<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::create([
        //     'name' => 'Rivaldo Valentino',
        //     'email' => 'test@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'username' => 'rivaldo',
        // ]);

        // User::factory(10)->create();
        // Post::factory(30)->create();
        Category::create([
            "name" => "Anime",
            "slug" => "anime"
        ]);
        Category::create([
            "name" => "Teknologi",
            "slug" => "teknologi"
        ]);
        Category::create([
            "name" => "Lainnya",
            "slug" => "lainnya"
        ]);
        Category::create([
            "name" => "Music",
            "slug" => "music"
        ]);
        Category::create([
            "name" => "Film",
            "slug" => "film"
        ]);
        Category::create([
            "name" => "Sains",
            "slug" => "sains"
        ]);
        Category::create([
            "name" => "Game",
            "slug" => "game"
        ]);
        Category::create([
            "name" => "Lifestyle",
            "slug" => "lifestyle"
        ]);
    }
}