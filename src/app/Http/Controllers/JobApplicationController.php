<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

/**
 * @method authorize(string $string, Job $job)
 */
class JobApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        return view('job_applications.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Job $job)
    {
        $this->authorize('apply', $job);
        $validated = $request->validate(['salary_expectation' => 'required|numeric|min:1|max:1000000']);

        $job->applications()->create([
            'user_id' => auth()->id(),
            ...$validated
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted successfully');
    }
}
