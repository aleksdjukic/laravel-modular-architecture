<?php

namespace Modules\Job\app\Exceptions;

use App\Exceptions\DomainException;

class JobNotFoundException extends DomainException
{
    public function __construct()
    {
        parent::__construct('Job not found.');
    }

    public function status(): int
    {
        return 404;
    }
}
