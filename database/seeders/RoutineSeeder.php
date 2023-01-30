<?php

namespace Database\Seeders;

use App\Models\PlannedExercise;
use App\Models\Routine;
use App\Models\User;
use Database\Seeders\Traits\AttachRandomImage;
use Illuminate\Database\Seeder;

class RoutineSeeder extends Seeder
{
    use AttachRandomImage;
    public function run()
    {
        $admin = User::where('email', 'admin@fitme.pl')->first();
        $routines = Routine::factory(10)->create([
            'owner_id' => $admin->getKey(),
        ]);

        $mergedRoutines = $routines->merge(Routine::factory(10)->create());
        foreach ($mergedRoutines as $routine) {
            $routine
                ->addMediaFromUrl($this->randomImageUrl())
                ->toMediaCollection();
            PlannedExercise::factory(7)->create([
                'routine_id' => $routine->getKey()
            ]);
        }
    }
}
