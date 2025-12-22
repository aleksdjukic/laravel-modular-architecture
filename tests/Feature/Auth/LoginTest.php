<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Auth\app\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login(): void
    {
        User::factory()->create([
            'email' => 'test@test.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->postJson('/api/v1/auth/login', [
            'email' => 'test@test.com',
            'password' => 'password123',
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => ['token'],
            ]);
    }
}
