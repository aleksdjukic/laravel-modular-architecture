<?php

namespace Modules\Job\app\DTO;

use Modules\Job\app\Enums\EmploymentType;

class CreateJobDTO
{
    public function __construct(
        public int $companyId,
        public string $title,
        public string $description,
        public ?string $location,
        public EmploymentType $employmentType,
        public ?float $salaryFrom,
        public ?float $salaryTo,
        public bool $isActive,
    ) {}

    public static function fromValidated(array $data): self
    {
        return new self(
            companyId: (int) $data['company_id'],
            title: $data['title'],
            description: $data['description'],
            location: $data['location'] ?? null,
            employmentType: EmploymentType::from($data['employment_type']),
            salaryFrom: isset($data['salary_from']) ? (float) $data['salary_from'] : null,
            salaryTo: isset($data['salary_to']) ? (float) $data['salary_to'] : null,
            isActive: (bool) ($data['is_active'] ?? true),
        );
    }
}
