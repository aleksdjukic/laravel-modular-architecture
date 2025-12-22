<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiResourceCollection extends ResourceCollection
{
    protected string $resourceClass;

    public function __construct($resource, string $resourceClass)
    {
        parent::__construct($resource);
        $this->resourceClass = $resourceClass;
    }

    public function toArray($request): array
    {
        return [
            'data' => $this->collection->map(
                fn ($item) => new $this->resourceClass($item)
            ),
            'meta' => $this->when(
                method_exists($this->resource, 'total'),
                [
                    'current_page' => $this->resource->currentPage(),
                    'per_page'     => $this->resource->perPage(),
                    'total'        => $this->resource->total(),
                ]
            ),
        ];
    }
}
