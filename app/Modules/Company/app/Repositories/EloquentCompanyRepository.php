<?php

namespace Modules\Company\app\Repositories;

use Modules\Company\app\Exceptions\CompanyNotFoundException;
use Modules\Company\app\Models\Company;

class EloquentCompanyRepository implements CompanyRepositoryInterface
{
    public function findOrFail(int $id): Company
    {
        $company = Company::find($id);

        if (! $company) {
            throw new CompanyNotFoundException();
        }

        return $company;
    }

    public function create(array $data): Company
    {
        return Company::create($data);
    }

    public function update(Company $company, array $data): Company
    {
        $company->update($data);
        return $company;
    }
}
