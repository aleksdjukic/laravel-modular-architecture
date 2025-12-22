<?php

namespace Modules\Job\app\Repositories;

use Modules\Job\app\Models\Job;

class EloquentJobRepository implements JobRepositoryInterface
{
    public function paginate(int $perPage = 15)
    {
        return Job::with('company')->paginate($perPage);
    }

    public function findById(int $id): ?Job
    {
        return Job::with('company')->find($id);
    }

    public function create(array $data): Job
    {
        return Job::create($data);
    }

    public function update(Job $job, array $data): Job
    {
        $job->update($data);

        return $job;
    }

    public function delete(Job $job): void
    {
        $job->delete();
    }
}
