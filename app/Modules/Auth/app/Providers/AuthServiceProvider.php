<?php

namespace Modules\Auth\app\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Auth\app\Repositories\EloquentUserRepository;
use Modules\Auth\app\Repositories\UserRepositoryInterface;
use Modules\Auth\app\Services\AuthService;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->singleton(AuthService::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}
