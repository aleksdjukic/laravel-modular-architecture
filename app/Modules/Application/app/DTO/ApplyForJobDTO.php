<?php

namespace Modules\Application\app\DTO;

class ApplyForJobDTO
{
    public function __construct(
        public int $jobId,
        public string $email,
        public string $fullName,
        public ?string $cvPath = null
    ) {}

    public static function fromValidated(array $data): self
    {
        return new self(
            jobId: (int) $data['job_id'],
            email: (string) $data['email'],
            fullName: (string) $data['full_name'],
            cvPath: $data['cv_path'] ?? null
        );
    }
}
