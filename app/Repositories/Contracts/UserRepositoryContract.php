<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use App\Models\WorkoutPlan;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryContract extends BaseRepositoryContract
{
    public function attachWorkoutPlan(User $user, int $workoutPlanId): bool;
    public function detachWorkoutPlan(User $user, int $workoutPlanId): bool;
}
