<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Get random user and thread IDs
        $userIds = User::pluck('id')->toArray();
        $threadIds = Thread::pluck('id')->toArray();
        $postIds = Post::pluck('id')->toArray();

        // Pick a random parent post or null
        $parentPostId = fake()->optional()->randomElement($postIds)->get();

        Post::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => 'My Coffee Mug Is Missing—Send Help!',
            'content' => 'Sometimes I think my only talent is avoiding responsibilities.',
            'thread_id' => fake()->randomElement($threadIds),
            'post_id' => $parentPostId,
        ]);

        Post::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => '',
            'content' => 'I tried to adult today and accidentally bought a kid’s meal for myself.',
            'thread_id' => fake()->randomElement($threadIds),
            'post_id' => $parentPostId,
        ]);

        Post::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => 'My Plant Is Alive! (For Now)',
            'content' => 'My plant and I are in a competition to see who can survive the longest without water.',
            'thread_id' => fake()->randomElement($threadIds),
            'post_id' => $parentPostId,
        ]);

        Post::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => '',
            'content' => 'Every day is a new opportunity to wonder how little I know.',
            'thread_id' => fake()->randomElement($threadIds),
            'post_id' => $parentPostId,
        ]);

        Post::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => '',
            'content' => 'If life gives you lemons, just squirt them in your tea and call it a day.',
            'thread_id' => fake()->randomElement($threadIds),
            'post_id' => $parentPostId,
        ]);

        Post::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => '',
            'content' => 'My life is a series of attempts not to forget what I was just about to do.',
            'thread_id' => fake()->randomElement($threadIds),
            'post_id' => $parentPostId,
        ]);
    }
}
