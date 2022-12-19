<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\Team;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Category::factory(10)->create();
        // Slider::factory(5)->create();
        // Post::factory(40)->create();
        // Tag::factory(25)->create();
        // Comment::factory(100)->create();
        Reply::factory(200)->create();
        // Message::factory(25)->create();
        // Team::factory(4)->create();
    }
}
