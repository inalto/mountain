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
<<<<<<< HEAD
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
=======
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'email_verified_at'        => '2020-10-01 16:44:42',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
//                'verified'           => 1,
                
//                'verification_token' => '',
                'first_name'          => '',
                'last_name'          => '',
                'tagline'            => '',
                'city'               => '',
                'country'            => '',
>>>>>>> master
            ],
        ];

        User::insert($users);
    }
}
