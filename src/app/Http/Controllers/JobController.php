<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session(['jobs_index_url' => url()->full()]);

        $filters = request()->only(
            'search',
            'min-salary',
            'max-salary',
            'experience',
            'category'
        );
        return view(
            'jobs.index',
            ['jobs' => Job::filter($filters)->with('employer')->paginate(10)->appends(request()->query())]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job->load('employer.jobs')]);
    }

}
