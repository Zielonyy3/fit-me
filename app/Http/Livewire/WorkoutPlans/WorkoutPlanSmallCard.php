<?php

namespace App\Http\Livewire\WorkoutPlans;

use App\Models\User;
use App\Models\WorkoutPlan;
use App\Repositories\Contracts\UserRepositoryContract;
use Livewire\Component;

class WorkoutPlanSmallCard extends Component
{
    public WorkoutPlan $workoutPlan;
    public User $user;

    public function render()
    {
        return view('livewire.workout-plans.workout-plan-small-card');
    }

    public function detachWorkoutPlan(UserRepositoryContract $userRepository)
    {
        $userRepository->detachWorkoutPlan($this->user, $this->workoutPlan->getKey());
        $this->emit('workoutPlansUpdated');
    }

}
