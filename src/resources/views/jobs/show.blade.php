<x-layout>
    <div class="mb-4">
        <x-breadcrumbs :links="[
            'Jobs' => route('jobs.index'),
            $job->title => route('jobs.show', $job),
        ]" />
    </div>

    <x-jobs.card class="mb-4" :$job >
        <article class="text-sm text-slate-500">
            <p>
                {!! nl2br(e($job->description)) !!}
            </p>
        </article>
    </x-jobs.card>
</x-layout>
