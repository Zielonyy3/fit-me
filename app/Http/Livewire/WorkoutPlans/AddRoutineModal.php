<?php

namespace App\Http\Livewire\WorkoutPlans;

use App\Models\Routine;
use App\Repositories\Contracts\RoutineRepositoryContract;
use Livewire\Component;

class AddRoutineModal extends Component
{
    private ?Routine $routine;

    protected $listeners = ['routineSelected'];

    public function routineSelected(int $id)
    {
        $this->routine = app(RoutineRepositoryContract::class)->find($id);
        $this->emit('routineLoaded');
    }

    public function mount()
    {
        $this->routine = null;
    }

    public function render()
    {
        return view('livewire.workout-plans.add-routine-modal', [
            'routine' => $this->routine,
        ]);
    }

}
