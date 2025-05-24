<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::create([
            'display_name' => 'Joe',
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'about_me' => 'I am no one. I am nothing.',
            'password' => '12345678',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'display_name' => 'Jimmy',
            'name' => 'Jane Smith',
            'email' => 'jane.smith@outlook.com',
            'about_me' => 'I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS',
            'password' => '12345678',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'display_name' => 'Bob',
            'name' => 'William Smith',
            'email' => 'william.smith@gmail.com',
            'about_me' => 'That Jimmy person sure is strange...',
            'password' => '12345678',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'display_name' => 'Jill',
            'name' => 'JilqingIt',
            'email' => 'jill_jooner@oulook.com',
            'about_me' => '#Jill2025',
            'password' => '12345678',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'display_name' => 'Lorem',
            'name' => 'Lorem Ipsum',
            'email' => 'lorem.ipsum@dolor.com',
            'about_me' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet labore quae ducimus alias porro',
            'password' => '12345678',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'display_name' => 'Barack Obama',
            'name' => 'Jayden',
            'email' => 'barackobama@us.gov',
            'about_me' => 'It\'s me, former two-time US president Barack Obama.',
            'password' => '12345678',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
