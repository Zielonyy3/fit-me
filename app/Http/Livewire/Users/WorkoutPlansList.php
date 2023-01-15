<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class WorkoutPlansList extends Component
{
    public User $user;
    public Collection $workoutPlans;

    protected $listeners = ['workoutPlansUpdated'];

    public function workoutPlansUpdated()
    {
        $this->user->refresh();
    }

    public function render()
    {
        $this->workoutPlans = $this->user->workoutPlans;
        return view('livewire.users.workout-plans-list');
    }
}
