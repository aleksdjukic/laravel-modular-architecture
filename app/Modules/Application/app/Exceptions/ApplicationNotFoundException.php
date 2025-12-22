<?php

namespace Modules\Application\app\Exceptions;

use RuntimeException;

class ApplicationNotFoundException extends RuntimeException
{
    protected $message = 'Application not found.';
}
