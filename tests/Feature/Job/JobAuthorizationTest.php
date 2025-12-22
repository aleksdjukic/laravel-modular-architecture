<?php

namespace Tests\Feature\Job;

use Tests\TestCase;
use Modules\Auth\app\Models\User;
use Modules\Company\app\Models\Company;
use Modules\Job\app\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_update_job_from_other_company(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

        $company = Company::factory()->create([
            'owner_id' => $owner->id,
        ]);

        $job = Job::factory()->create([
            'company_id' => $company->id,
        ]);

        $this->actingAs($otherUser, 'api')
            ->putJson("/api/v1/jobs/{$job->id}", [
                'title' => 'Updated title'
            ])
            ->assertForbidden();
    }
}
