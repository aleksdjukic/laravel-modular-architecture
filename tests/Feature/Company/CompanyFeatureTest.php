<?php

namespace Tests\Feature\Company;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Auth\app\Models\User;

class CompanyFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_owner_can_create_company(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')->postJson('/api/v1/companies', [
            'name' => 'Test Company',
            'slug' => 'test-company',
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('companies', [
            'name' => 'Test Company',
            'owner_id' => $user->id,
        ]);
    }
}
