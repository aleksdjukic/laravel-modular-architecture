<?php

namespace Modules\Job\app\Policies;

use Modules\Auth\app\Models\User;
use Modules\Job\app\Models\Job;

class JobPolicy
{
    public function manage(User $user, Job $job): bool
    {
        return (int) $job->company->owner_id === (int) $user->id;
    }

    public function update(User $user, Job $job): bool
    {
        return $this->manage($user, $job);
    }

    public function delete(User $user, Job $job): bool
    {
        return $this->manage($user, $job);
    }
}
