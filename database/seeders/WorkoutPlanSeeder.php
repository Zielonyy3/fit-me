<?php

namespace Database\Seeders;

use App\Models\Routine;
use App\Models\WorkoutPlan;
use Faker\Factory;
use Illuminate\Database\Seeder;

class WorkoutPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $workoutPlans = WorkoutPlan::factory(10)->create();
        foreach ($workoutPlans as $workoutPlan) {
            $this->addPlannedRoutines($workoutPlan);
        }
    }

    private function addPlannedRoutines(WorkoutPlan $workoutPlan, int $times = 5)
    {
        $faker = Factory::create();
        $lastEndDay = 1;
        dump('start', $lastEndDay);
        for ($i = 1; $i <= $times; $i++) {
            $routine = Routine::all()->random();
            dump($lastEndDay);
            $newLastEndDay = $faker->numberBetween($lastEndDay, $lastEndDay + 21);
            $workoutPlan->routines()->attach($routine->getKey(), [
                'notes' => $faker->realText(100),
                'start_day' => $lastEndDay,
                'end_day' => $newLastEndDay,
            ]);
            $lastEndDay = $newLastEndDay;
        }
        dump('koniec', $lastEndDay);

    }
}
