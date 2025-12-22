<?php

namespace Modules\Company\app\Policies;

use Modules\Auth\app\Models\User;
use Modules\Company\app\Models\Company;

class CompanyPolicy
{
    public function manage(User $user, Company $company): bool
    {
        return (int) $user->id === (int) $company->owner_id;
    }
}
