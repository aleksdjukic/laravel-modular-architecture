<?php

namespace Modules\Company\app\Services;

use Modules\Company\app\Models\Company;
use Modules\Company\app\Repositories\CompanyRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;

class CompanyService
{
    public function __construct(
        private readonly CompanyRepositoryInterface $companies
    ) {}

    public function create(array $data, Authenticatable $user): Company
    {
        $data['owner_id'] = $user->getAuthIdentifier();

        return $this->companies->create($data);
    }

    public function update(Company $company, array $data): Company
    {
        return $this->companies->update($company, $data);
    }
}
