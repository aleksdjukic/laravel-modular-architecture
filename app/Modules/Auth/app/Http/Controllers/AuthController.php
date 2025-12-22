<?php

namespace Modules\Auth\app\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Auth\app\DTO\LoginDTO;
use Modules\Auth\app\DTO\RegisterDTO;
use Modules\Auth\app\Http\Requests\LoginRequest;
use Modules\Auth\app\Http\Requests\RegisterRequest;
use Modules\Auth\app\Http\Resources\AuthResource;
use Modules\Auth\app\Http\Resources\UserResource;
use Modules\Auth\app\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $auth
    ) {}

    public function register(RegisterRequest $request): JsonResponse
    {
        $payload = $this->auth->register(
            RegisterDTO::fromValidated($request->validated())
        );

        return response()->json([
            'data' => new AuthResource($payload),
        ], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $payload = $this->auth->login(
            LoginDTO::fromValidated($request->validated())
        );

        return response()->json([
            'data' => new AuthResource($payload),
        ]);
    }

    public function me(): JsonResponse
    {
        $user = $this->auth->me();

        return response()->json([
            'data' => new UserResource($user),
        ]);
    }

    public function logout(): JsonResponse
    {
        $this->auth->logout();

        return response()->json([], 204);
    }

    public function refresh(): JsonResponse
    {
        $payload = $this->auth->refresh();

        return response()->json([
            'data' => new AuthResource($payload),
        ]);
    }
}
