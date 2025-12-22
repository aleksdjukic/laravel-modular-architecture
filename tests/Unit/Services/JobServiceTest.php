<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Job\app\Services\JobService;
use Modules\Job\app\DTO\CreateJobDTO;
use Modules\Job\app\Enums\EmploymentType;
use Modules\Company\app\Models\Company;

class JobServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_job_is_created(): void
    {
        $company = Company::factory()->create();

        $dto = CreateJobDTO::fromValidated([
            'company_id' => $company->id,
            'title' => 'Test Job',
            'description' => 'Desc',
            'employment_type' => EmploymentType::FULL_TIME->value,
        ]);

        $job = app(JobService::class)->create($dto);

        $this->assertNotNull($job->id);
    }
}
