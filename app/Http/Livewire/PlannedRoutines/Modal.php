<?php

namespace App\Http\Livewire\PlannedRoutines;

use App\Models\PlannedRoutine;
use App\Models\Routine;
use App\Models\WorkoutPlan;
use App\Repositories\Contracts\PlannedRoutineRepositoryContract;
use App\Repositories\Contracts\RoutineRepositoryContract;
use Livewire\Component;

class Modal extends Component
{
    protected $listeners = ['routineSelected', 'plannedRoutineSelected', 'openModal'];
    public string $message;

    public ?Routine $routine;
    public ?PlannedRoutine $plannedRoutine;
    public ?WorkoutPlan $workoutPlan;

    public function render()
    {
        return view('livewire.planned-routines.modal');
    }
    public function plannedRoutineSelected(int $id)
    {
        $this->plannedRoutine = app(PlannedRoutineRepositoryContract::class)->find($id);
        $this->routine = null;
        $this->emit('plannedRoutineLoaded');
    }

    public function routineSelected(int $id)
    {
        $this->routine = app(RoutineRepositoryContract::class)->find($id);
        $this->plannedRoutine = null;
        $this->emit('routineLoaded');
    }

    public function submitFormAction()
    {
        $this->emit('submitFormAddRoutineModal');
    }

    public function submitPlannedRoutineAction()
    {
        $this->emit('submitPlannedRoutineModal');
    }

    public function mount()
    {
        $this->routine = null;
    }

}
