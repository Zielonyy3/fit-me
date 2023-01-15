<?php

namespace App\Repositories;

use App\Dtos\PlannedRoutineSaveDto;
use App\Models\PlannedRoutine;
use App\Models\WorkoutPlan;
use App\Repositories\Contracts\PlannedRoutineRepositoryContract;

class PlannedRoutineRepository extends BaseRepository implements PlannedRoutineRepositoryContract
{
    public function __construct(PlannedRoutine $model)
    {
        parent::__construct($model);
    }

    public function store(WorkoutPlan $workoutPlan, PlannedRoutineSaveDto $plannedRoutineSaveDto): PlannedRoutine
    {
        return $this->create(array_merge(
            ['workout_plan_id' => $workoutPlan->getKey()],
            $plannedRoutineSaveDto->toArray(),
        ));
    }

}
