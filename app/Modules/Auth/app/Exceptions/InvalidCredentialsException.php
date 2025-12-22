<?php

namespace Modules\Auth\app\Exceptions;

use RuntimeException;

class InvalidCredentialsException extends RuntimeException
{
    protected $message = 'Invalid credentials.';
}
