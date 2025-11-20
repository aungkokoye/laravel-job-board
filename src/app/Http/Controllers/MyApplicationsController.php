<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = auth()->user()
            ->applications()
            ->with([
                'job' => fn($query) => $query->withCount('applications')
                    ->withAvg('applications', 'salary_expectation'),
                'job.employer'
            ])
            ->latest()
            ->get();

        return view('my_applications.index', ['applications' => $applications]);
    }

    public function destroy(JobApplication $myApplication)
    {
        $myApplication->delete();
        return redirect()->back()->with('success', 'Application deleted successfully');
    }
}
