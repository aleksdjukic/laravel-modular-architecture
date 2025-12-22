<?php

namespace Modules\Company\app\DTO;

class UpdateCompanyDTO
{
    public function __construct(
        public string $name,
        public ?string $email,
        public ?string $phone,
        public ?string $website,
        public ?string $description,
        public bool $isActive,
    ) {}

    public static function fromValidated(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            website: $data['website'] ?? null,
            description: $data['description'] ?? null,
            isActive: (bool) ($data['is_active'] ?? true),
        );
    }
}
