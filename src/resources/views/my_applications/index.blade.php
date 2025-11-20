<x-layout>
    <div class="mb-4">
        <x-breadcrumbs :links="['My Job Applications' => '#']" />
    </div>

    @forelse($applications as $application)
        <x-jobs.card class="mb-4" :job="$application->job">
            <div class="flex justify-between items-center">
                <div class="text-sm text-slate-400">
                    <div> Applied At: {{ $application->updated_at->diffForHumans() }}</div>
                    <div> Applied Salary: £ {{ number_format($application->salary_expectation) }}</div>
                    <div> Total Applications: {{ $application->job->applications_count - 1}}</div>
                    <div> Average Salary Expectation:
                        £ {{ number_format($application->job->applications_avg_salary_expectation) }}
                    </div>
                </div>
                <div class="flex justify-between items-center gap-2">
                    <div>
                        <a href="{{  route('jobs.show', $application->job) }}"
                           class="inline-block  btn bg-slate-50 text-slate-500 font-medium px-4 py-2 rounded-md
                        ring-1 ring-slate-500 hover:bg-slate-200 cursor-pointer"> View Job </a>
                    </div>
                    <div>
                        <form action="{{ route('my-applications.destroy', $application) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn bg-slate-50 text-slate-500 font-medium px-4 py-2 rounded-md
                        ring-1 ring-slate-500 hover:bg-slate-200 cursor-pointer">
                                Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </x-jobs.card>
    @empty
        <span class="text-gray-700">You have not applied for any jobs yet.</form>
    @endforelse
</x-layout>
