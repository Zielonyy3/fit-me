<?php

namespace App\Http\Livewire\WorkoutPlans;

use App\Models\WorkoutPlan;
use Livewire\Component;

class PlannedRoutines extends Component
{
    public WorkoutPlan $workoutPlan;


    public function render()
    {
        return view('livewire.workout-plans.planned-routines', [
            'plannedRoutines' => $this->workoutPlan->routines,
        ]);
    }
}
