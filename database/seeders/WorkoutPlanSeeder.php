<?php

namespace Database\Seeders;

use App\Models\PlannedRoutine;
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
            $this->addPlannedRoutines($workoutPlan, 5);
        }
    }

    private function addPlannedRoutines(WorkoutPlan $workoutPlan, int $times = 5)
    {
        $faker = Factory::create();
        $lastEndDay = 1;
        for ($i = 1; $i <= $times; $i++) {
            $newLastEndDay = $faker->numberBetween($lastEndDay, $lastEndDay + 21);
            PlannedRoutine::factory()->create([
                'workout_plan_id' => $workoutPlan->getKey(),
                'start_day' => $lastEndDay,
                'end_day' => $newLastEndDay,
            ]);
            $lastEndDay = $newLastEndDay;
        }
    }
}
