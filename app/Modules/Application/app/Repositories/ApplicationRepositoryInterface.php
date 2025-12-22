<?php

namespace Modules\Application\app\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Application\app\Models\Application;

interface ApplicationRepositoryInterface
{
    public function paginate(int $perPage = 15, ?int $jobId = null): LengthAwarePaginator;

    public function findOrFail(int $id): Application;

    public function existsForJobAndCandidate(int $jobId, int $candidateId): bool;

    public function create(array $data): Application;

    public function update(Application $application, array $data): Application;

    public function delete(Application $application): void;
}
