<x-layout>
    @forelse($jobs as $job)
        <x-card class="mb-4">
            <x-flex-box class="mb-2">
                <div>
                    <h1 class="text-slate-700 text-lg"> {{ $job->title }}</h1>
                </div>
                <div class="text-sm text-slate-500">
                    £ {{ number_format($job->salary) }}
                </div>
            </x-flex-box>
            <x-flex-box  class="mb-4">
                <div class="text-md text-slate-500">
                    Company Name  {{ $job->location }}
                </div>

                <div class="flex gap-2">
                    <div class="rounded-md bg-slate-400 text-white px-2 py-1 text-xs">
                        {{ $job->experience }}
                    </div>
                    <div class="rounded-md bg-slate-400 text-white px-2 py-1 text-xs">
                        {{ $job->category }}
                    </div>
                </div>
            </x-flex-box >

            <article class="text-sm text-slate-500">
                <p>
                    {!! nl2br(e($job->description)) !!}
                </p>
            </article>
        </x-card>
    @empty
        <span class="text-gray-700">No jobs found.</span>
    @endforelse

    <div class="mt-6">
        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
