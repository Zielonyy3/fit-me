<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkoutPlan>
 */
class WorkoutPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words($this->faker->numberBetween(1, 2), true),
            'description' => $this->faker->realText(500),
            'owner_id' => User::all()->random()->getKey(),
        ];
    }
}
