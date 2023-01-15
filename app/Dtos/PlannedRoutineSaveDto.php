<?php

namespace App\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class PlannedRoutineSaveDto extends DataTransferObject
{
    public int $routine_id;
    public ?string $name;
    public int $start_day;
    public int $end_day;
    public ?string $notes;
}
