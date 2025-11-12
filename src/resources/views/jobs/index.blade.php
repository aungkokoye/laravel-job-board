<x-layout>
    <div class="mb-4">
        <x-breadcrumbs :links="[
            'Jobs' => route('jobs.index')
        ]" />
    </div>

    <x-card class="mb-4">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="grid grid-cols-2 gap-4 p-4">
                <div>
                    <div class="text-slate-500 text-lg mb-4"> Search </div>
                    <x-text-input name="search" placeholder="Search by job title or description ..." value="{{ request('search') }}"/>
                </div>
                <div>
                    <div class="text-slate-500 text-lg mb-4"> Salary </div>
                    <div class="flex items-center gap-2">
                        <x-text-input name="min-salary" placeholder="Minimum Salar" value="{{ request('min-salary') }}"/>
                        <x-text-input name="mix-salary" placeholder="Maximum Salary" value="{{ request('mix-salary') }}"/>
                    </div>
                </div>
                <div>
                    <div class="text-slate-500 text-lg mb-4"> Experience </div>
                    <x-radio-group name="experience" :options="\App\Models\Job::$experiences" />
                </div>
                <div>
                    <div class="text-slate-500 text-lg mb-4"> Category </div>
                    <x-radio-group name="category" :options="\App\Models\Job::$categories" />
                </div>
            </div>
            <div class="flex justify-self-auto gap-6">
                <button type="submit"  class="btn bg-slate-50 text-slate-500 font-medium px-4 py-2 rounded-md
                ring-1 ring-slate-500 hover:bg-slate-200">
                    Filter
                </button>
                <a href="{{ route('jobs.index') }}" class="btn bg-slate-200 text-slate-500 font-medium px-4 py-2
                    rounded-md ring-1 ring-slate-500 hover:bg-slate-200"> Reset </a>
            </div>
        </form>
    </x-card>

    @forelse($jobs as $job)
        <x-jobs.card class="mb-4" :$job>
            <div class="mt-6">
                <x-link-button :herf="route('jobs.show', $job)" :text="'View Job'"/>
            </div>
        </x-jobs.card>
    @empty
        <span class="text-gray-700">No jobs found.</span>
    @endforelse

    <div class="mt-6">
        {{ $jobs->links('vendor.pagination.tailwind') }}
    </div>
</x-layout>
