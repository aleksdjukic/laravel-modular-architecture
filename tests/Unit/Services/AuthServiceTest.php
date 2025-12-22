<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Auth\app\Services\AuthService;

class AuthServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_creates_user(): void
    {
        $service = app(AuthService::class);

        $user = $service->register([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => 'password123',
        ]);

        $this->assertNotNull($user->id);
        $this->assertEquals('test@test.com', $user->email);
    }
}
