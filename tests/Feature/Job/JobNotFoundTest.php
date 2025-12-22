<?php

namespace Tests\Feature\Job;

use Tests\TestCase;
use Modules\Auth\app\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobNotFoundTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_non_existing_job_returns_404(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'api')
            ->getJson('/api/v1/jobs/999999')
            ->assertStatus(404);
    }
}
