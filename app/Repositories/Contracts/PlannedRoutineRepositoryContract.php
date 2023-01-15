<?php

namespace App\Repositories\Contracts;

use App\Dtos\PlannedRoutineSaveDto;
use App\Models\PlannedRoutine;
use App\Models\WorkoutPlan;

interface PlannedRoutineRepositoryContract extends BaseRepositoryContract
{
    public function store(WorkoutPlan $workoutPlan, PlannedRoutineSaveDto $plannedRoutineSaveDto): PlannedRoutine;
}
