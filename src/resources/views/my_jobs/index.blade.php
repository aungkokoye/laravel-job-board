<x-layout>
    <h1 class="text-slate-400 text-center text-lg mb-8"> Create Job Form</h1>

    @if (session('success'))
        <div class="border-1 border-l-4 border-green-300 p-4 mb-4 text-green-600 font-medium text-lg
    bg-green-100 rounded-md">
            {{ session('success')}}
        </div>
    @endif

    @if (session('error'))
        <div class=" border-1 border-l-4 border-red-300 p-4 mb-4 text-reed-600 font-medium text-lg
        bg-red-100 rounded-md">
            {{ session('success')}}
        </div>
    @endif

    <div class="mb-4 flex justify-between items-center">
        <div>
            <x-breadcrumbs :links="['My Jobs' => '#']" />
        </div>
        <div>
            <x-link-button herf="{{ route('my-jobs.create') }}" text="Create Job" />
        </div>
    </div>
    <div>
        @forelse($jobs as $job)
            <x-jobs.card class="mb-4" :$job>
                @if($job->canEdit())
                <div class="flex justify-end items-center mb-2">
                    <div>
                        <a href=" {{ route('my-jobs.edit', $job ) }}"
                           class="btn btn-sm border-1 border-slate-50 bg-slate-200 text-slate-400 rounded-md
                            hover:bg-slate-300 p-1">
                            Edit Job
                        </a>
                    </div>
                </div>
                @endif

                @forelse($job->applications as $application)
                    <div class="flex items-center justify-between mb-2 text-slate-400 text-s">
                        <div>
                            <div> {{ $application->user->name }}</div>
                            <div> Applied : {{ $application->created_at->diffForHumans() }}</div>
                            <div> CV Upload Link</div>
                        </div>
                        <div>
                           Expected Salary : £ {{ number_format($application->salary_expectation) }}
                        </div>

                    </div>
                @empty
                    <p class="text-slate-400 text-lg"> There is no applications.</p>
                @endforelse
            </x-jobs.card>
        @empty
            <p class="text-slate-400 text-lg"> There is no jobs.</p>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $jobs->links('vendor.pagination.tailwind') }}
    </div>

</x-layout>
