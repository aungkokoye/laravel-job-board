<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $jobs = Job::all();

        foreach($users as $user) {
            $randomJobs = $jobs->random(rand(2, 5));

            foreach ($randomJobs as $job) {
                JobApplication::factory()
                    ->for($user)   // one user
                    ->for($job)    // one job
                    ->create();
            }
        }
    }
}
