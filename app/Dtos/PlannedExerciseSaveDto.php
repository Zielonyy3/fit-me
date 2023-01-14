<?php

namespace App\Dtos;

use App\Enums\TargetType;
use Spatie\DataTransferObject\DataTransferObject;

class PlannedExerciseSaveDto extends DataTransferObject
{
    public ?int $id;
    public int $exercise_id;
    public int $sets;
    public TargetType $target_type;
    public float $target;
    public int $rest_time;
    public int $order;
    public int $routine_id;
}
