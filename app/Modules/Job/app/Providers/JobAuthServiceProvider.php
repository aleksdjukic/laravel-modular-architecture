<?php

namespace Modules\Job\app\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Modules\Job\app\Models\Job;
use Modules\Job\app\Policies\JobPolicy;

class JobAuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::policy(Job::class, JobPolicy::class);
    }
}
