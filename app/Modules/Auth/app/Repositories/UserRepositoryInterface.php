<?php

namespace Modules\Auth\app\Repositories;

use Modules\Auth\app\Models\User;

interface UserRepositoryInterface
{
    public function findByEmail(string $email): ?User;
    public function create(array $data): User;
}
