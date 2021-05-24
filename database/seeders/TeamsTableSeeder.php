<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        $teams = [
            [
                'user_id'    => 1,
                'name' => 'Admin',
                'personal_team' => 1
            ],
            [
                'user_id'    => 2,
                'name' => 'User',
                'personal_team' => 0
            ],
        ];

        Team::insert($teams);
    }
}
