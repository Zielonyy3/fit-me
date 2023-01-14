<?php

namespace Database\Seeders;

use App\Models\PlannedExercise;
use App\Models\Routine;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoutineSeeder extends Seeder
{

    public function run()
    {
        $admin = User::where('email', 'admin@fitme.pl')->first();
        $routines = Routine::factory(10)->create([
            'owner_id' => $admin->getKey(),
        ]);

        $mergedRoutines = $routines->merge(Routine::factory(10)->create());
        foreach ($mergedRoutines as $routine) {
            print($routine->getKey() . '\n');
            PlannedExercise::factory(7)->create([
                'routine_id' => $routine->getKey()
            ]);
        }
    }
}
