<?php

namespace Tests\Unit\Policies;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Auth\app\Models\User;
use Modules\Company\app\Models\Company;
use Modules\Company\app\Policies\CompanyPolicy;

class CompanyPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_owner_can_manage_company(): void
    {
        $user = User::factory()->create();
        $company = Company::factory()->create([
            'owner_id' => $user->id,
        ]);

        $policy = new CompanyPolicy();

        $this->assertTrue($policy->manage($user, $company));
    }
}
