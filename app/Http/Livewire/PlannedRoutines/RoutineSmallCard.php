<?php

namespace App\Http\Livewire\PlannedRoutines;

use App\Models\PlannedRoutine;
use App\Repositories\Contracts\PlannedRoutineRepositoryContract;
use Livewire\Component;

class RoutineSmallCard extends Component
{
    public PlannedRoutine $plannedRoutine;
    public function render(bool $showAccordion = false)
    {
        return view('livewire.planned-routines.routine-small-card');
    }

    public function deletePlannedRoutine()
    {
        app(PlannedRoutineRepositoryContract::class)->delete($this->plannedRoutine);
        $this->emit('plannedRoutinesUpdated');
    }
    public function editPlannedRoutine()
    {
        $this->emit('plannedRoutineSelected', $this->plannedRoutine->getKey());
    }

}
