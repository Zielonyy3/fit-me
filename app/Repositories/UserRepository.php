<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\WorkoutPlan;
use App\Repositories\Contracts\UserRepositoryContract;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function attachWorkoutPlan(User $user, int $workoutPlanId): bool
    {
        $user->workoutPlans()->attach($workoutPlanId);
        return true;
    }
    public function detachWorkoutPlan(User $user, int $workoutPlanId): bool
    {
        $user->workoutPlans()->detach($workoutPlanId);
        return true;
    }

}
