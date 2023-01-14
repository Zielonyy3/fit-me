<?php

namespace App\Services;


use App\Dtos\RoutineSaveDto;
use App\Models\Exercise;
use App\Models\Routine;
use App\Repositories\Contracts\PlannedExerciseRepositoryContract;
use App\Repositories\Contracts\RoutineRepositoryContract;
use App\Services\Contracts\RoutineServiceContract;

class RoutineService implements RoutineServiceContract
{
    public function __construct(private RoutineRepositoryContract $routineRepository, private PlannedExerciseRepositoryContract $plannedExerciseRepository)
    {
    }

    public function create(RoutineSaveDto $routineSaveDto): Routine
    {
        $routine = $this->routineRepository->create($routineSaveDto->toArray());
        $this->plannedExerciseRepository->create([
            'routine_id' => $routine->getKey(),
            'exercise_id' => Exercise::all()->random()->getKey(),
        ]);
        return $routine;
    }
}
