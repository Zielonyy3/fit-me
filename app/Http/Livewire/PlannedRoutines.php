<?php

namespace App\Http\Livewire;

use App\Models\WorkoutPlan;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PlannedRoutines extends Component
{
    public WorkoutPlan $workoutPlan;
    public Collection $plannedRoutines;

    protected $listeners = ['plannedRoutinesUpdated'];

    public function plannedRoutinesUpdated()
    {
        $this->workoutPlan->refresh();
    }

    public function render()
    {
        $this->plannedRoutines = $this->workoutPlan->plannedRoutines;
        return view('livewire.planned-routines');
    }
}
