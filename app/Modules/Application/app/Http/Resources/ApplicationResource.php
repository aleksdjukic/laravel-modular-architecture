<?php

namespace Modules\Application\app\Http\Resources;

use App\Http\Resources\ApiResource;
use Modules\Job\app\Resources\JobResource;

class ApplicationResource extends ApiResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'status'     => $this->status,
            'job'        => new JobResource($this->whenLoaded('job')),
            'created_at' => $this->created_at?->toISOString(),
        ];
    }
}
