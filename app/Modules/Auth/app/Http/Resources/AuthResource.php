<?php

namespace Modules\Auth\app\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public function toArray($request): array
    {
        // expected payload: ['user' => User, 'token' => string, 'token_type' => 'bearer', 'expires_in' => int|null]
        return [
            'user' => new UserResource($this['user']),
            'token' => $this['token'],
            'token_type' => $this['token_type'] ?? 'bearer',
            'expires_in' => $this['expires_in'] ?? null,
        ];
    }
}
