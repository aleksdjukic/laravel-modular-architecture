<?php

namespace Modules\Job\app\Resources;

use App\Http\Resources\ApiResource;
use Modules\Company\App\Resources\CompanyResource;

class JobResource extends ApiResource
{
    public function toArray($request): array
    {
        return [
            'id'              => $this->id,
            'title'           => $this->title,
            'description'     => $this->description,
            'location'        => $this->location,
            'employment_type' => $this->employment_type,
            'salary_from'     => $this->salary_from,
            'salary_to'       => $this->salary_to,
            'is_active'       => $this->is_active,
            'company'         => new CompanyResource($this->whenLoaded('company')),
            'created_at'      => $this->created_at?->toISOString(),
        ];
    }
}
