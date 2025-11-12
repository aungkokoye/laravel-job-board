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
            <div class="rounded-md ring-1 ring-slate-500 text-slate-500 px-2 py-1 text-xs">
                {{ $job->experience }}
            </div>
            <div class="rounded-md ring-1 ring-slate-500 text-slate-500  px-2 py-1 text-xs">
                {{ $job->category }}
            </div>
        </x-flex-box >
    </x-flex-box >

    {{ $slot }}
</x-card>
