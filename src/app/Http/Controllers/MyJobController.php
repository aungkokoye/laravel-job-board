<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyJobRequest;
use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MyJobController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Auth()->user()->employer->jobs()
            ->with(['applications', 'employer', 'applications.user'])
            ->latest()
            ->paginate(10);

        return view('my_jobs.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MyJobRequest $request)
    {
        $validated = $request->validated();
        Auth()->user()->employer->jobs()->create($validated);

        return redirect()->route('my-jobs.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $myJob)
    {
        $this->authorize('editEmployerJob', $myJob);
        return view('my_jobs.update', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MyJobRequest $request, Job $myJob)
    {
        $this->authorize('editEmployerJob', $myJob);
        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
