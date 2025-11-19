<x-layout>
    <div class="mb-4">
        <x-breadcrumbs :links="[
            'Jobs' => session('jobs_index_url', route('jobs.index')),
            $job->title => route('jobs.show', $job),
        ]" />
    </div>

    @if (session()->has('success'))
        <div class="relative bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded mb-6"
             role="alert">
            {{ session('success')}}
        </div>
    @endif

    <x-jobs.card class="mb-4" :$job >
        <article class="text-sm text-slate-500 mb-4">
            <p>
                {!! nl2br(e($job->description)) !!}
            </p>
        </article>

        @can('apply', $job)
            <a href="{{ route('job.application.create', ['job' => $job])  }}"
               class="px-4 py-2 border border-transparent font-medium rounded-md shadow-sm
            text-medium text-white bg-slate-400 focus:outline-none focus:ring-2 focus:ring-offset-2
            focus:ring-blue-500"> Apply </a>
        @else
            <span class="text-medium text-slate-800">You have already applied for this job.</span>
        @endcan

    </x-jobs.card>

    <x-card class="mb4">
        <h2 class="text-lg text-slate-500 mb-4"> More Jobs From {{ $job->employer->company_name }}</h2>

        @forelse($job->employer->jobs as $job)
            <x-flex-box class="mb-4">
                <div>
                    <div class="text-medium text-slate-500 hover:text-blue-300">
                        <a href="{{ route('jobs.show', $job) }}"> {{ $job->title }} </a>
                    </div>
                    <div class="text-medium text-slate-500">
                        {{ $job->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="text-sm text-slate-500"> £ {{ number_format($job->salary) }} </div>
            </x-flex-box>
        @empty
            <div class="text-medium text-slate-500"> No Jobs Found. </div>
        @endforelse
    </x-card>

</x-layout>
