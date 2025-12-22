<?php

namespace App\Exceptions;

use RuntimeException;

abstract class DomainException extends RuntimeException
{
    abstract public function status(): int;

    public function errorCode(): string
    {
        return class_basename(static::class);
    }
}
