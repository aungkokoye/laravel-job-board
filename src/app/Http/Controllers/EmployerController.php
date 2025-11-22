<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    use AuthorizesRequests;

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('register', Employer::class);

        return view('employers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('register', Employer::class);

        $validated = $request->validate([
            "company_name" => "required|string|max:255",
        ]);

        auth()->user()->employer()->create($validated);

        return redirect()->route('jobs.index')
            ->with('success', 'Employer profile created successfully');
    }
}
