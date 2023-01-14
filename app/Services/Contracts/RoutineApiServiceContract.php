<?php

namespace App\Services\Contracts;


use App\Models\Routine;
use Illuminate\Database\Eloquent\Collection;

interface RoutineApiServiceContract
{
    public function updatePlannedExercises(Routine $routine, array $data): Collection;
}
