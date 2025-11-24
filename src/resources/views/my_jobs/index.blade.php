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
                <div class="flex justify-end items-center mb-2">
                    @if($job->deleted_at !== null && $job->canDeleteOrRestore())
                        <div>
                            <form action="{{ route('my-jobs.restore', $job->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to restore this job?');">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                        class="btn btn-xs border-1 border-slate-50 bg-slate-200 text-slate-400 rounded-md
                                    hover:bg-slate-300 p-1">
                                    Restore Job
                                </button>
                            </form>
                        </div>

                    @elseif($job->canDeleteOrRestore())

                    <div>
                        <form action="{{ route('my-jobs.destroy', $job) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this job?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-xs border-1 border-slate-50 bg-red-200 text-red-400 rounded-md
                                    hover:bg-red-300 p-1">
                                Delete Job
                            </button>
                        </form>
                    </div>
                    @endif

                    @if($job->canEdit())
                    <div>
                        <a href=" {{ route('my-jobs.edit', $job ) }}"
                           class="btn btn-sm border-1 border-slate-50 bg-slate-200 text-slate-400 rounded-md
                            hover:bg-slate-300 p-2">
                            Edit Job
                        </a>
                    </div>
                    @endif

                </div>

                @forelse($job->applications as $application)
                    <div class="flex items-center justify-between mb-2 text-slate-400 text-s">
                        <div>
                            <div> {{ $application->user->name }}</div>
                            <div> Applied : {{ $application->created_at->diffForHumans() }}</div>
                            <div class="hover:text-blue-400"> <a href="{{ route('cv.download', $application->file_path) }}">Download CV</a></div>
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
