<?php

namespace App\Http\Resources;

class ApiResourceFactory
{
    public static function collection($resource, string $class)
    {
        return new ApiResourceCollection($resource, $class);
    }
}
