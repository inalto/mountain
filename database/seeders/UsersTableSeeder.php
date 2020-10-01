<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-10-01 16:44:42',
                'verification_token' => '',
                'last_name'          => '',
                'tagline'            => '',
                'city'               => '',
                'country'            => '',
            ],
        ];

        User::insert($users);
    }
}
