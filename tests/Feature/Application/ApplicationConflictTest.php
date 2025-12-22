<?php

namespace Tests\Feature\Application;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Auth\app\Models\User;
use Modules\Application\app\Models\Application;
use Modules\Job\app\Models\Job;
use Laravel\Sanctum\Sanctum;

class ApplicationConflictTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_apply_twice_for_same_job(): void
    {
        $user = User::factory()->create();
        $job = Job::factory()->create();

        Sanctum::actingAs($user);

        Application::create([
            'job_id' => $job->id,
            'candidate_id' => $user->id,
            'status' => 'pending',
        ]);

        $response = $this->postJson("/api/v1/jobs/{$job->id}/apply");

        $response->assertStatus(409)
            ->assertJson([
                'code' => 'ApplicationAlreadyExistsException',
            ]);
    }
}
