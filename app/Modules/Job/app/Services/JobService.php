<?php

namespace Modules\Job\app\Services;

use Modules\Job\app\Repositories\JobRepositoryInterface;
use Modules\Job\app\Exceptions\JobNotFoundException;
use Modules\Job\app\Models\Job;

class JobService
{
    public function __construct(
        private readonly JobRepositoryInterface $jobs
    ) {}

    public function list(int $perPage = 10)
    {
        return $this->jobs->paginate($perPage);
    }

    public function get(int $id): Job
    {
        $job = $this->jobs->findById($id);

        if (! $job) {
            throw new JobNotFoundException();
        }

        return $job;
    }

    public function create(array $data): Job
    {
        return $this->jobs->create($data);
    }

    public function update(int $id, array $data): Job
    {
        $job = $this->get($id);

        return $this->jobs->update($job, $data);
    }

    public function delete(int $id): void
    {
        $job = $this->get($id);

        $this->jobs->delete($job);
    }
}
