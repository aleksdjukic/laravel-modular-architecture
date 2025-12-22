<?php

namespace Modules\Company\App\Resources;

use App\Http\Resources\ApiResource;

class CompanyDetailResource extends ApiResource
{
    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'owner_id'    => $this->owner_id,
            'name'        => $this->name,
            'slug'        => $this->slug,
            'email'       => $this->email,
            'phone'       => $this->phone,
            'website'     => $this->website,
            'description' => $this->description,
            'is_active'   => $this->is_active,
            'created_at'  => $this->created_at?->toISOString(),
        ];
    }
}
