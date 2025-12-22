<?php

namespace Modules\Company\app\Repositories;

use Modules\Company\app\Models\Company;

interface CompanyRepositoryInterface
{
    public function findOrFail(int $id): Company;
    public function create(array $data): Company;
    public function update(Company $company, array $data): Company;
}
