<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Module Service Providers
use Modules\Auth\app\Providers\AuthServiceProvider;
use Modules\Application\app\Providers\ApplicationServiceProvider;
use Modules\Company\app\Providers\CompanyServiceProvider;
use Modules\Job\app\Providers\JobServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(ApplicationServiceProvider::class);
        $this->app->register(CompanyServiceProvider::class);
        $this->app->register(JobServiceProvider::class);
    }

    public function boot(): void
    {
        //
    }
}
