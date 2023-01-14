<?php

namespace App\Services;


use App\Models\Routine;
use App\Repositories\Contracts\PlannedExerciseRepositoryContract;
use App\Services\Contracts\RoutineApiServiceContract;
use Illuminate\Database\Eloquent\Collection;

class RoutineApiService implements RoutineApiServiceContract
{

    public function __construct(private PlannedExerciseRepositoryContract $plannedExerciseRepository)
    {

    }

    public function updatePlannedExercises(Routine $routine, array $data): Collection
    {
        $routinePlannedExercisesIds = $routine->plannedExercises()->pluck('id')->toArray();
        foreach ($data as $plannedExerciseDto) {
            if(empty($plannedExerciseDto->id) || in_array($plannedExerciseDto->id, $routinePlannedExercisesIds)) {
                $this->plannedExerciseRepository->updateOrCreate($plannedExerciseDto);
            }
        }
        return $routine->plannedExercises;
    }
}
