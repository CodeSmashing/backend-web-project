<?php

namespace Database\Seeders;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Get random user and thread IDs
        $userIds = User::pluck('id')->toArray();

        Thread::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => 'Why Do Socks Disappear in the Dryer? A Deep Dive',
            'description' => '',
            'is_locked' => 'true'
        ]);

        Thread::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => 'The Official Procrastinators’ Support Group (We’ll Meet Tomorrow)',
            'description' => '',
            'is_locked' => 'false'
        ]);

        Thread::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => 'Are Leftovers Just Food With Trust Issues?',
            'description' => '',
            'is_locked' => 'false'
        ]);

        Thread::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => 'My Cat Just Stared at the Wall for 2 Hours—Should I Be Worried?',
            'description' => '',
            'is_locked' => fake()->boolean()
        ]);

        Thread::create([
            'user_id' => fake()->randomElement($userIds),
            'title' => 'The Great Debate: Is Cereal a Soup?',
            'description' => '',
            'is_locked' => fake()->boolean()
        ]);
    }
}
