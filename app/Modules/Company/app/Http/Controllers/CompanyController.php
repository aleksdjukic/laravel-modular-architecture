<?php

namespace Modules\Company\app\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Company\app\DTO\CreateCompanyDTO;
use Modules\Company\app\DTO\UpdateCompanyDTO;
use Modules\Company\app\Http\Requests\StoreCompanyRequest;
use Modules\Company\app\Http\Requests\UpdateCompanyRequest;
use Modules\Company\app\Http\Resources\CompanyResource;
use Modules\Company\app\Services\CompanyService;

class CompanyController extends Controller
{
    public function __construct(
        private CompanyService $companies
    ) {}

    public function store(StoreCompanyRequest $request): JsonResponse
    {
        $company = $this->companies->create(
            CreateCompanyDTO::fromValidated(
                $request->validated(),
                $request->user()->id
            )
        );

        return response()->json([
            'data' => new CompanyResource($company),
        ], 201);
    }

    public function update(int $id, UpdateCompanyRequest $request): JsonResponse
    {
        $company = $this->companies->update(
            $id,
            UpdateCompanyDTO::fromValidated($request->validated())
        );

        return response()->json([
            'data' => new CompanyResource($company),
        ]);
    }
}
