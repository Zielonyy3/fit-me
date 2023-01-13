<?php

namespace App\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class RoutineSaveDto extends DataTransferObject
{
    public string $name;
    public ?string $description;
}
