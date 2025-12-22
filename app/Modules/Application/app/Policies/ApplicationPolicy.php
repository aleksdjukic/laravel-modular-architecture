<?php

namespace Modules\Application\app\Policies;

use Modules\Auth\app\Models\User;;
use Modules\Application\app\Models\Application;

class ApplicationPolicy
{
    public function manage(User $user, Application $application): bool
    {
        return (int) $user->id === (int) ($application->job?->company?->owner_id);
    }
}
