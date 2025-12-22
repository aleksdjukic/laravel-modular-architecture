<?php

namespace Modules\Auth\app\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Auth\app\DTO\LoginDTO;
use Modules\Auth\app\DTO\RegisterDTO;
use Modules\Auth\app\Exceptions\EmailAlreadyTakenException;
use Modules\Auth\app\Exceptions\InvalidCredentialsException;
use Modules\Auth\app\Exceptions\UnauthorizedException;
use Modules\Auth\app\Models\User;
use Modules\Auth\app\Repositories\UserRepositoryInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    public function __construct(
        private readonly UserRepositoryInterface $users
    ) {}

    public function register(RegisterDTO $dto): array
    {
        if ($this->users->findByEmail($dto->email)) {
            throw new EmailAlreadyTakenException();
        }

        $user = $this->users->create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
            'role' => $dto->role,
        ]);

        $token = JWTAuth::fromUser($user);

        return [
            'user' => $user,
            'token' => $token,
            'token_type' => 'bearer',
            // expires_in is optional; depends on your jwt config
            'expires_in' => null,
        ];
    }

    public function login(LoginDTO $dto): array
    {
        $token = auth('api')->attempt([
            'email' => $dto->email,
            'password' => $dto->password,
        ]);

        if (! $token) {
            throw new InvalidCredentialsException();
        }

        /** @var User $user */
        $user = auth('api')->user();

        return [
            'user' => $user,
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => null,
        ];
    }

    public function me(): User
    {
        /** @var User|null $user */
        $user = auth('api')->user();

        if (! $user) {
            throw new UnauthorizedException();
        }

        return $user;
    }

    public function logout(): void
    {
        if (! auth('api')->check()) {
            throw new UnauthorizedException();
        }

        auth('api')->logout();
    }

    public function refresh(): array
    {
        if (! auth('api')->check()) {
            throw new UnauthorizedException();
        }

        $token = auth('api')->refresh();

        /** @var User $user */
        $user = auth('api')->user();

        return [
            'user' => $user,
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => null,
        ];
    }
}
