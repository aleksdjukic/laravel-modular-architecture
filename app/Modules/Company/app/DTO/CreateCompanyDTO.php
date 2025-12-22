<?php

namespace Modules\Company\app\DTO;

class CreateCompanyDTO
{
    public function __construct(
        public int $ownerId,
        public string $name,
        public string $slug,
        public ?string $email,
        public ?string $phone,
        public ?string $website,
        public ?string $description,
        public bool $isActive,
    ) {}

    public static function fromValidated(array $data, int $ownerId): self
    {
        return new self(
            ownerId: $ownerId,
            name: $data['name'],
            slug: $data['slug'],
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            website: $data['website'] ?? null,
            description: $data['description'] ?? null,
            isActive: (bool) ($data['is_active'] ?? true),
        );
    }
}
