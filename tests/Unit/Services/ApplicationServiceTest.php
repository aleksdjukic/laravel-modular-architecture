<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Application\app\Services\ApplicationService;
use Modules\Application\app\DTO\ApplyForJobDTO;
use Modules\Job\app\Models\Job;

class ApplicationServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_application_is_created(): void
    {
        $job = Job::factory()->create();

        $dto = new ApplyForJobDTO(
            jobId: $job->id,
            email: 'test@test.com',
            fullName: 'Test User',
            cvPath: null
        );

        $application = app(ApplicationService::class)->apply($dto);

        $this->assertNotNull($application->id);
    }
}
