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
        <form action="{{ route('job.application.store', ['job' => $job]) }}" method="POST" class="space-y-4"
            enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <x-label for="salary_expectation" value="Expected Salary:"/>
                <x-text-input id="salary_expectation" name="salary_expectation" type="number"/>
            </div>

            <div class="mb-6">
                <x-label for="cv" value="CV File Upload: "/>
                <x-text-input id="cv" name="cv" type="file"/>
            </div>

            <div>
                <x-long-button value="Apply" />
            </div>
        </form>
    </x-card>

</x-layout>
