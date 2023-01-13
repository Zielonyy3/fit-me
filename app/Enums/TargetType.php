<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static Google()
 * @method static Facebook()
 */
final class TargetType extends Enum implements LocalizedEnum
{
    const Time = 'time';
    const Weight = 'weight';
}
