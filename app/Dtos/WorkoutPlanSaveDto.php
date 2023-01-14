<?php

namespace App\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class WorkoutPlanSaveDto extends DataTransferObject
{
    public int $owner_id;
    public string $name;
    public ?string $description;
}
