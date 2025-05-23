<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Faq;
use App\Models\Thread;
use App\Models\Post;
use Database\Seeders\FaqSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // User::factory(10)->create();

        // User::factory()->create();
        // User::factory()->create();
        // User::factory()->create();
        Faq::factory()->create();
        Faq::factory()->create();
        Faq::factory()->create();
        (new UserSeeder())->run();
        (new FaqSeeder())->run();
        Thread::factory()->create();
        Thread::factory()->create();
        Thread::factory()->create();
        Thread::factory()->create();
        Thread::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
        Post::factory()->create();
    }
}
