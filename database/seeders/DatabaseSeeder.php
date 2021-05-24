<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            
            TeamsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionTeamTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            UsersInaltoSeeder::class,
            RoleUserTableSeeder::class,
            TeamUserTableSeeder::class,
            ReportsTableSeeder::class,
        ]);
    }
}
