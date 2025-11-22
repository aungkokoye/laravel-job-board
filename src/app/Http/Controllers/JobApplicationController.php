<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    use authorizesRequests;

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
        $validated = $request->validate([
            'salary_expectation' => 'required|numeric|min:1|max:1000000',
            'cv' => 'required|mimes:pdf|max:2048'
            ]);

        $user_id = auth()->id();
        $filename = $user_id . '_' . $job->id . '.' . $request->file('cv')->getClientOriginalExtension();
        $path = $request->file('cv')->storeAs('', $filename, 'cvs');

        $job->applications()->create([
            'user_id'               => $user_id,
            'job_id'                => $job->id,
            'salary_expectation'    => $validated['salary_expectation'],
            'file_path'             => $path,
        ]);


        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted successfully');
    }
}
