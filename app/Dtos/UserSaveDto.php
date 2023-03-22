<?php

namespace App\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class UserSaveDto extends DataTransferObject
{
    public string $first_name;
    public string $last_name;
    public string $email;
    public ?string $bio;
}
