<?php

namespace Database\Factories;

use App\Models\Routine;
use App\Models\WorkoutPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlannedRoutine>
 */
class PlannedRoutineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startDay = $this->faker->numberBetween(0, 100);
        return [
            'workout_plan_id' => WorkoutPlan::all()->random()->getKey(),
            'routine_id' => Routine::all()->random()->getKey(),
            'name' => $this->faker->words($this->faker->numberBetween(1, 2), true),
            'start_day' => $startDay,
            'end_day' => $this->faker->numberBetween($startDay, $startDay + 50),
            'notes' => $this->faker->realText(500),
        ];
    }
}
