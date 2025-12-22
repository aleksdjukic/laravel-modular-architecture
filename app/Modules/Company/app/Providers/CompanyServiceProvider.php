<?php

namespace Modules\Company\app\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Company\app\Repositories\CompanyRepositoryInterface;
use Modules\Company\app\Repositories\EloquentCompanyRepository;

class CompanyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            CompanyRepositoryInterface::class,
            EloquentCompanyRepository::class
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/Migrations');
    }
}
