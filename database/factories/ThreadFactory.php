<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        // Get random user ID
        $userIds = User::pluck('id')->toArray();

        return [
            'user_id' => fake()->randomElement($userIds),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'is_locked' => fake()->boolean()
        ];
    }
}
