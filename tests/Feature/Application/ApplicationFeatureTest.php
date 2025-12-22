<?php

namespace Tests\Feature\Application;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Job\app\Models\Job;

class ApplicationFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_candidate_can_apply_for_job(): void
    {
        $job = Job::factory()->create();

        $response = $this->postJson('/api/v1/applications', [
            'job_id' => $job->id,
            'email' => 'test@example.com',
            'full_name' => 'Test User',
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('applications', [
            'job_id' => $job->id,
        ]);
    }

    public function test_candidate_cannot_apply_twice_for_same_job(): void
    {
        $job = Job::factory()->create();

        $payload = [
            'job_id' => $job->id,
            'email' => 'test@example.com',
            'full_name' => 'Test User',
        ];

        $this->postJson('/api/v1/applications', $payload);
        $response = $this->postJson('/api/v1/applications', $payload);

        $response->assertStatus(409);
    }
}
