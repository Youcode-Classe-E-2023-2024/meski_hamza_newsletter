<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create template',
            'read template',
            'update template',
            'delete template',
            'send template',
            'handle video',
            'handle user'
        ];

        foreach($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
