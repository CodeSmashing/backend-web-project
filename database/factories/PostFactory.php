<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Thread;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        // Get random user and thread IDs
        // $userIds = User::pluck('id')->toArray();
        // $threadIds = Thread::pluck('id')->toArray();
        $postIds = Post::pluck('id')->toArray();

        // Pick a random parent post or null
        $postId = fake()->optional()->randomElement($postIds);

        return [
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'content' => fake()->text(),
            'thread_id' => Thread::query()->inRandomOrder()->value('id'),
            'post_id' => $postId,
        ];
    }
}
