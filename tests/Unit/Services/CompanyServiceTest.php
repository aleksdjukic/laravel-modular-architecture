<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Company\app\Services\CompanyService;
use Modules\Company\app\DTO\CreateCompanyDTO;
use Modules\Auth\app\Models\User;

class CompanyServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_company_can_be_created(): void
    {
        $user = User::factory()->create();

        $dto = new CreateCompanyDTO(
            ownerId: $user->id,
            name: 'Test Company',
            slug: 'test-company',
            email: null,
            phone: null,
            website: null,
            description: null,
            isActive: true
        );

        $company = app(CompanyService::class)->create($dto);

        $this->assertNotNull($company->id);
    }
}
