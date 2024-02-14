<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class AssignRoleToUserController extends Controller
{
    public function assignRoleToUser(User $user)
    {
//        $user->assignRole($roleName);
        $newRole = [request()->role];
        $user->syncRoles($newRole);

        return redirect()->route('admin.show');
    }
}
