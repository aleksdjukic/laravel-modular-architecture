<?php

namespace Modules\Application\app\Repositories;

use App\Models\Application;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    public function paginate(int $perPage = 15)
    {
        return Application::with(['candidate', 'job'])
            ->orderByDesc('created_at')
            ->paginate($perPage);
    }

    public function find(int $id): ?Application
    {
        return Application::with(['candidate', 'job'])->find($id);
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
        if (!$application->delete()) {
            throw new \RuntimeException('Application delete failed.');
        }
    }
}
