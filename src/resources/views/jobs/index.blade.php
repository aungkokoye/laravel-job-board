<x-layout>

    <div class="flex justify-between items-center mb-4">
        <div>
            <h1 class="text-2xl text-slate-400 hover:text-blue-400"> <a href="/">Home</a> </h1>
        </div>
        <div class="text-slate-400 font-medium flex items-center gap-2">
            @auth
                <div>
                    <a href="{{ route('my-applications.index') }}" class=" hover:text-blue-400">
                        {{ auth()->user()->name ?? 'Anonymous User' }} : Applications
                    </a>
                    |
                </div>
                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-slate-400-400 text-medium cursor-pointer hover:text-blue-400">
                            Logout
                        </button>
                    </form>
                </div>

            @else
                <a href="{{ route('login') }}" class="text-slate-400-400 text-medium cursor-pointer hover:text-blue-400">
                    Login
                </a>
            @endauth
        </div>

    </div>

    <div class="mb-4">
        <x-breadcrumbs :links="['Jobs' => route('jobs.index')]" />
    </div>

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


    <x-card class="mb-4">
        <form action="{{ route('jobs.index') }}" method="GET" x-ref="job-filter">
            <div class="grid grid-cols-2 gap-4 p-4">
                <div>
                    <div class="text-slate-500 text-lg mb-4"> Search </div>
                    <x-text-input name="search" placeholder="Search by job title or description ..." value="{{ request('search') }}"
                                  formRef="job-filter" />
                </div>
                <div>
                    <div class="text-slate-500 text-lg mb-4"> Salary </div>
                    <div class="flex items-center gap-2">
                        <x-text-input name="min-salary" placeholder="Minimum Salar" value="{{ request('min-salary') }}"
                                      formRef="job-filter" />
                        <x-text-input name="mix-salary" placeholder="Maximum Salary" value="{{ request('mix-salary') }}"
                                      formRef="job-filter" />
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
                        ring-1 ring-slate-500 hover:bg-slate-200 cursor-pointer">
                    Filter
                </button>
                <a href="{{ route('jobs.index') }}" class="btn bg-slate-50 text-slate-500 font-medium px-4 py-2 rounded-md
                        ring-1 ring-slate-500 hover:bg-slate-200"> Reset </a>
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
