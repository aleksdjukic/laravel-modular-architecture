<?php

namespace Modules\Auth\app\Exceptions;

use RuntimeException;

class UnauthorizedException extends RuntimeException
{
    protected $message = 'Unauthorized.';
}
