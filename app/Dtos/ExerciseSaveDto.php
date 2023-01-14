<?php

namespace App\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class ExerciseSaveDto extends DataTransferObject
{
    public int $owner_id;
    public string $name;
    public ?string $description;
}
