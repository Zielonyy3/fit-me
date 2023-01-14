<?php

namespace App\Repositories;

use App\Dtos\PlannedExerciseSaveDto;
use App\Models\PlannedExercise;
use App\Repositories\Contracts\PlannedExerciseRepositoryContract;

class PlannedExerciseRepository extends BaseRepository implements PlannedExerciseRepositoryContract
{
    public function __construct(PlannedExercise $model)
    {
        parent::__construct($model);
    }

    public function updateOrCreate(PlannedExerciseSaveDto $plannedExerciseSaveDto): PlannedExercise
    {
        $data = $plannedExerciseSaveDto->except('id')->toArray();
        $plannedExercise = !empty($plannedExerciseSaveDto->id) ? $this->find($plannedExerciseSaveDto->id) : null;
        if (!empty($plannedExercise)) {
            $this->update($plannedExercise, $data);
        } else {
            $plannedExercise = $this->create($data);
        }
        return $plannedExercise;
    }

}
