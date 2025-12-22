<?php

namespace Modules\Application\app\Services;

use Modules\Application\app\Exceptions\ApplicationAlreadyExistsException;
use Modules\Application\app\Models\Application;

class ApplicationService
{
    public function apply(int $jobId, int $candidateId): Application
    {
        $exists = Application::query()
            ->where('job_id', $jobId)
            ->where('candidate_id', $candidateId)
            ->exists();

        if ($exists) {
            throw new ApplicationAlreadyExistsException();
        }

        return Application::create([
            'job_id' => $jobId,
            'candidate_id' => $candidateId,
            'status' => 'pending',
        ]);
    }
}
