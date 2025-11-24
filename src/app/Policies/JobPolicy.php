<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Response;

class JobPolicy
{
    public function editEmployerJob(?User $user, Job $job): bool
    {
        if ($user->employer->id !== $job->employer_id) {
            return false;
        }

        if ($job->applications()->count() > 0) {
            abort(403, 'You cannot edit a job that has already been applied to.');
        }

        return true;
    }

    public function apply(?User $user, Job $job): bool
    {
        return $job->canApplyApplication();
    }
}
