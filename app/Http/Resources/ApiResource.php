<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class ApiResource extends JsonResource
{
    public function with($request): array
    {
        return [];
    }
}
