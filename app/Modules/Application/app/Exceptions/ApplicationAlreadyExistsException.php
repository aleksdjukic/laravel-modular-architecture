<?php

namespace Modules\Application\app\Exceptions;

use App\Exceptions\DomainException;

class ApplicationAlreadyExistsException extends DomainException
{
    public function __construct()
    {
        parent::__construct('You have already applied for this job.');
    }

    public function status(): int
    {
        return 409;
    }
}
