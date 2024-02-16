<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AssignRolesToUserSeeder extends Seeder
{

    public function run()
    {
        $user = User::where('email', 'hamza@gmail.com')->first();
        $user->assignRole('admin');

        $users = User::all();
        foreach ($users as $user) {
            $user->assignRole('member');
        }
    }
}
