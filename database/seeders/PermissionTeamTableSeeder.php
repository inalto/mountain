<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Team;
use Illuminate\Database\Seeder;

class PermissionTeamTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Team::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Team::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
