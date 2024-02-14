<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class FakeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 30; $i++) {
            User::create([
                'name' => "user$i",
                'email' => "user$i@gmail.com",
                'image' => "user$i image",
                'bio' => "user$i bio",
                'password' => Hash::make("user$i@gmail.com")
            ]);
        }
    }
}
