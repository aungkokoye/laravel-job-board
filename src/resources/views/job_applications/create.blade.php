<x-layout>
    <div class="mb-4">
        <x-breadcrumbs :links="[
            'Jobs'      => session('jobs_index_url', route('jobs.index')),
            $job->title => route('jobs.show', $job),
            'Apply'     => '#'
        ]" />
    </div>

    <x-jobs.card class="mb-4" :$job >
        <article class="text-sm text-slate-500">
            <p>
                {!! nl2br(e($job->description)) !!}
            </p>
        </article>
    </x-jobs.card>

    <x-card>
        <h2 class="text-slate-400 text-lg text-center mb-4"> Apply Job </h2>
        <form action="{{ route('job.application.store', ['job' => $job]) }}" method="POST" class="space-y-4">
            @csrf

            <div class="mb-6">
                <label for="salary_expectation" class="block mb-2 text-slate-400">Expected Salary:</label>
                <input id="salary_expectation" name="salary_expectation" type="number"
                       class="w-full rounded-md @error('salary_expectation') border-red-400 @enderror"/>
                @error('salary_expectation')
                <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-slate-500 mb-4 border-1 border-slate-200 p-2 rounded-md hover:bg-green-50 bg-slate-50">
                <button type="submit" class="btn-m btn-primary w-full cursor-pointer">Apply</button>
            </div>
        </form>
    </x-card>

</x-layout>
