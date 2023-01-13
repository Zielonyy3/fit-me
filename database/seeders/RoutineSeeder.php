<?php

namespace Database\Seeders;

use App\Models\Routine;
use Illuminate\Database\Seeder;

class RoutineSeeder extends Seeder
{

    public function run()
    {
        Routine::factory(10)->create();
    }
}
