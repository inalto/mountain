<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([

            RolesTableSeeder::class,
            PermissionsTableSeeder::class,

            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            UsersInaltoSeeder::class,
            RoleUserTableSeeder::class,

            TagsTableSeeder::class,

            //ReportsTableSeeder::class,
        ]);
    }
}
