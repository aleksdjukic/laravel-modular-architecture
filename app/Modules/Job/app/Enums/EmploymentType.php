<?php

namespace Modules\Job\app\Enums;

enum EmploymentType: string
{
    case FULL_TIME = 'full_time';
    case PART_TIME = 'part_time';
    case CONTRACT = 'contract';
    case INTERNSHIP = 'internship';

    public static function values(): array
    {
        return array_map(fn ($c) => $c->value, self::cases());
    }
}
