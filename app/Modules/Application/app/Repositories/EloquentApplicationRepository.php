<?php

namespace Modules\Application\app\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Application\app\Exceptions\ApplicationNotFoundException;
use Modules\Application\app\Models\Application;

class EloquentApplicationRepository implements ApplicationRepositoryInterface
{
    public function paginate(int $perPage = 15, ?int $jobId = null): LengthAwarePaginator
    {
        $q = Application::query()
            ->with(['candidate', 'job.company'])
            ->orderByDesc('created_at');

        if ($jobId) {
            $q->where('job_id', $jobId);
        }

        return $q->paginate($perPage);
    }

    public function findOrFail(int $id): Application
    {
        $application = Application::with(['candidate', 'job.company'])->find($id);

        if (! $application) {
            throw new ApplicationNotFoundException();
        }

        return $application;
    }

    public function existsForJobAndCandidate(int $jobId, int $candidateId): bool
    {
        return Application::where('job_id', $jobId)
            ->where('candidate_id', $candidateId)
            ->exists();
    }

    public function create(array $data): Application
    {
        return Application::create($data);
    }

    public function update(Application $application, array $data): Application
    {
        $application->update($data);
        return $application;
    }

    public function delete(Application $application): void
    {
        if (! $application->delete()) {
            throw new \RuntimeException('Application delete failed.');
        }
    }
}
