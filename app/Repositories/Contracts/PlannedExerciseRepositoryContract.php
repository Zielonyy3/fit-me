<?php

namespace App\Repositories\Contracts;

use App\Dtos\PlannedExerciseSaveDto;
use App\Models\PlannedExercise;

interface PlannedExerciseRepositoryContract extends BaseRepositoryContract
{
    public function updateOrCreate(PlannedExerciseSaveDto $plannedExerciseSaveDto): PlannedExercise;
}
