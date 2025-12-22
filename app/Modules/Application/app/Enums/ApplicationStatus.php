<?php

namespace Modules\Application\app\Enums;

enum ApplicationStatus: string
{
    case PENDING = 'pending';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
}
