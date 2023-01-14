<?php

namespace App\Services\Contracts;


use App\Dtos\RoutineSaveDto;
use App\Models\Routine;

interface RoutineServiceContract
{
    public function create(RoutineSaveDto $routineSaveDto): Routine;

}
