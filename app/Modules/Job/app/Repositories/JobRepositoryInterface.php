<?php

namespace Modules\Job\app\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Job\app\Models\Job;

interface JobRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator;
    public function findById(int $id): ?Job;
    public function create(array $data): Job;
    public function update(Job $job, array $data): Job;
    public function delete(Job $job): void;
}
