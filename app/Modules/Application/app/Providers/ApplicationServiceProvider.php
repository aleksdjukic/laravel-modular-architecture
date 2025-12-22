<?php

namespace Modules\Application\app\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Application\app\Repositories\ApplicationRepositoryInterface;
use Modules\Application\app\Repositories\EloquentApplicationRepository;
use Modules\Application\app\Services\ApplicationService;

class ApplicationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ApplicationRepositoryInterface::class, EloquentApplicationRepository::class);
        $this->app->singleton(ApplicationService::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}
