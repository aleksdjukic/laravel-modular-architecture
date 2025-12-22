<?php

namespace Modules\Job\app\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Job\app\Repositories\EloquentJobRepository;
use Modules\Job\app\Repositories\JobRepositoryInterface;

class JobServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, EloquentJobRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}
