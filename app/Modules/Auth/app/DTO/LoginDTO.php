<?php

namespace Modules\Auth\app\DTO;

class LoginDTO
{
    public function __construct(
        public string $email,
        public string $password
    ) {}

    public static function fromValidated(array $data): self
    {
        return new self(
            email: (string) $data['email'],
            password: (string) $data['password']
        );
    }
}
