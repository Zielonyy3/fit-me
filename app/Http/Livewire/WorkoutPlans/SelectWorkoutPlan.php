<?php

namespace App\Http\Livewire\WorkoutPlans;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\Contracts\WorkoutPlanRepositoryContract;
use Livewire\Component;

class SelectWorkoutPlan extends Component
{
    public array $workoutPlans;
    public int $workoutPlanId = 0;
    public User $user;

    protected $listeners = ['selectedWorkoutPlan'];

    public function selectedWorkoutPlan(int $id)
    {
        $this->workoutPlanId = $id;
        $this->emit('select2');
    }
    public function render(WorkoutPlanRepositoryContract $workoutPlanRepositoryContract)
    {
        $this->workoutPlans = $workoutPlanRepositoryContract->all()->pluck('name', 'id')->toArray();
        return view('livewire.workout-plans.select-workout-plan');
    }

    public function attachWorkoutPlan(UserRepositoryContract $userRepositoryContract)
    {
        $userRepositoryContract->attachWorkoutPlan($this->user, $this->workoutPlanId);
        $this->emit('workoutPlansUpdated');
    }
}
