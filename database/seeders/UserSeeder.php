<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'password' => '12345678'
        ]);
        User::create([
            'display_name' => 'Jimmy',
            'name' => 'Jane Smith',
            'email' => 'jane.smith@outlook.com',
            'about_me' => 'I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS, I LOVE MUFFINS',
            'password' => '12345678'
        ]);
        User::create([
            'display_name' => 'Bob',
            'name' => 'William Smith',
            'email' => 'william.smith@gmail.com',
            'about_me' => 'That Jimmy person sure is strange...',
            'password' => '12345678'
        ]);
    }
}
