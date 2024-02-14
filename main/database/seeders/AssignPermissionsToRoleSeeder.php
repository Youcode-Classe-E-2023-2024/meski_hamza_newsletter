<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissionsToRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::all();

        $member = Role::where('name', 'member')->first();
        $editor_lvl1 = Role::where('name', 'editor-lvl1')->first();
        $editor_lvl2 = Role::where('name', 'editor-lvl2')->first();
        $editor_lvl3 = Role::where('name', 'editor-lvl3')->first();
        $admin = Role::where('name', 'admin')->first();

        // permissions of user
        $member->givePermissionTo('read template');

        // permissions of admin
        foreach ($permissions as $permission) {
            $admin->givePermissionTo($permission->name);
        }

        // permissions of editor_lvl1
        $editor_lvl1->givePermissionTo('read template');
        $editor_lvl1->givePermissionTo('create template');
        $editor_lvl1->givePermissionTo('update template');
        $editor_lvl1->givePermissionTo('delete template');

        // permissions of editor_lvl2
        $editor_lvl2->givePermissionTo('read template');
        $editor_lvl2->givePermissionTo('create template');
        $editor_lvl2->givePermissionTo('update template');
        $editor_lvl2->givePermissionTo('delete template');
        $editor_lvl2->givePermissionTo('send template');

        // permissions of editor_lvl3
        $editor_lvl3->givePermissionTo('read template');
        $editor_lvl3->givePermissionTo('create template');
        $editor_lvl3->givePermissionTo('update template');
        $editor_lvl3->givePermissionTo('delete template');
        $editor_lvl3->givePermissionTo('send template');
        $editor_lvl3->givePermissionTo('handle video');
    }
}
