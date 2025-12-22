<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Application\app\Models\Application;
use Modules\Application\app\Enums\ApplicationStatus;
use Modules\Job\app\Models\Job;
use Modules\Application\app\Models\Candidate;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition(): array
    {
        return [
            'job_id' => Job::factory(),
            'candidate_id' => Candidate::factory(),
            'status' => ApplicationStatus::PENDING,
        ];
    }
}
