<?php

namespace Tests\Feature\Job;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Auth\app\Models\User;
use Modules\Company\app\Models\Company;
use Modules\Job\app\Enums\EmploymentType;

class JobFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_company_owner_can_create_job(): void
    {
        $user = User::factory()->create();
        $company = Company::factory()->create([
            'owner_id' => $user->id,
        ]);

        $response = $this->actingAs($user, 'api')->postJson('/api/v1/jobs', [
            'company_id' => $company->id,
            'title' => 'Backend Developer',
            'description' => 'Job description',
            'employment_type' => EmploymentType::FULL_TIME->value,
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('jobs', [
            'title' => 'Backend Developer',
            'company_id' => $company->id,
        ]);
    }
}
