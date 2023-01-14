<?php

namespace Database\Factories;

use App\Enums\TargetType;
use App\Models\Exercise;
use App\Models\Routine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlannedExercise>
 */
class PlannedExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'routine_id' => Routine::all()->random()->getKey(),
            'exercise_id' => Exercise::all()->random()->getKey(),
            'sets' => $this->faker->numberBetween(1, 6),
            'target_type' =>  TargetType::Weight,
            'target' => $this->faker->numberBetween(1, 100),
            'rest_time' => $this->faker->numberBetween(1, 180),
            'notes' => $this->faker->realText(100),
            'order' => $this->faker->numberBetween(1, 100)
        ];
    }
}
