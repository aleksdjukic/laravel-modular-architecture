<?php

namespace Modules\Auth\app\DTO;

class RegisterDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role = 'user'
    ) {}

    public static function fromValidated(array $data): self
    {
        return new self(
            name: (string) $data['name'],
            email: (string) $data['email'],
            password: (string) $data['password'],
            role: (string) ($data['role'] ?? 'user')
        );
    }
}
