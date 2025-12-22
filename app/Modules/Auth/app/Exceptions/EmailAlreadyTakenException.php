<?php

namespace Modules\Auth\app\Exceptions;

use RuntimeException;

class EmailAlreadyTakenException extends RuntimeException
{
    protected $message = 'Email is already taken.';
}
