<?php

namespace Tests\Unit\Policies;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Auth\app\Models\User;
use Modules\Company\app\Models\Company;
use Modules\Job\app\Models\Job;
use Modules\Job\app\Policies\JobPolicy;

class JobPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_owner_can_manage_job(): void
    {
        $user = User::factory()->create();
        $company = Company::factory()->create(['owner_id' => $user->id]);
        $job = Job::factory()->create(['company_id' => $company->id]);

        $policy = new JobPolicy();

        $this->assertTrue($policy->manage($user, $job));
    }

    public function test_non_owner_cannot_manage_job(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();

        $company = Company::factory()->create(['owner_id' => $owner->id]);
        $job = Job::factory()->create(['company_id' => $company->id]);

        $policy = new JobPolicy();

        $this->assertFalse($policy->manage($other, $job));
    }

}
