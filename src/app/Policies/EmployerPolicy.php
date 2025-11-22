<?php

namespace App\Policies;

use App\Models\User;

class EmployerPolicy
{
    public function register(User $user): bool
    {
        return $user->employer()->exists() === false;
    }
}
