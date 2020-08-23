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
                'password'           => '$2y$10$TY9Pm1u7XDzrjW6BPQbUz.3KTdo2tToL0R9mmPFPypaw9tvr0ytt6',
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-06-26 07:29:44',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
