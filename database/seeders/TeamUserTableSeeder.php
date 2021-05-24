<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TeamUserTableSeeder extends Seeder
{
    public function run()
    {
        User::findOrFail(1)->teams()->sync(1);
    }
}
