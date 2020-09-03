<?php

use App\User;
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
                'verified_at'        => '2020-09-03 17:29:38',
                'verification_token' => '',
                'last_name'          => '',
                'tagline'            => '',
            ],
        ];

        User::insert($users);
    }
}
