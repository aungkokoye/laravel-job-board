<x-card {{ $attributes }}>
    <x-flex-box class="mb-2">
        <div>
            <h1 class="text-slate-700 text-lg"> {{ ucfirst($job->title) }}</h1>
        </div>
        <div class="text-sm text-slate-500">
            £ {{ number_format($job->salary) }}
        </div>
    </x-flex-box>
    <x-flex-box  class="mb-4">
        <div class="text-md text-slate-500">
            Company Name  {{ $job->location }}
        </div>

        <x-flex-box  class="space-x-2">
            <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
                <x-tag lable="{{ $job->experience }}" />
            </a>
            <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
                <x-tag lable="{{ $job->category}}" />
            </a>
        </x-flex-box >
    </x-flex-box >

    {{ $slot }}
</x-card>
