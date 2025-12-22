<?php

namespace Modules\Company\App\Resources;

use App\Http\Resources\ApiResource;

class CompanyResource extends ApiResource
{
    public function toArray($request): array
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}
