<x-layout>
    <div class="mb-4">
        <x-breadcrumbs :links="[
            'My Jobs '      =>  route('my-jobs.index'),
            'Job Create'    => '#'
        ]" />
    </div>

    <x-card>
        <h2 class="text-slate-400 text-lg text-center mb-4"> Job  Create </h2>
        <form action="{{ route('my-jobs.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <x-label for="title" value="Job Title:" required="true"/>
                    <x-text-input id="title" name="title" type="text" value="{{ old('title') }}"/>
                </div>
                <div>
                    <x-label for="location" value="Location:" required="true"/>
                    <x-text-input id="location" name="location" type="text" value="{{ old('location') }}"/>
                </div>
                <div class="col-span-2">
                    <x-label for="salary" value="Salary:" required="true"/>
                    <x-text-input id="salary" name="salary" type="number" value="{{ old('salary') }}"/>
                </div>
                <div class="col-span-2">
                    <x-label for="description" value="Description:" />
                    <x-text-area-input name="description" cols=30 rows=5 value="{{ old('description') }}"/>
                </div>
                <div>
                    <x-label for="experience" value="Experience:" />
                    <x-radio-group name="experience" :options="\App\Models\Job::$experiences" :showAll="false"
                                   selected="{{ old('experience') }}"/>
                </div>
                <div>
                    <x-label for="category" value="Category:" />
                    <x-radio-group name="category" :options="\App\Models\Job::$categories" :showAll="false"
                                   selected="{{ old('category') }}"/>
                </div>
                <div class="col-span-2 mt-2">
                    <x-long-button type="submit" value="Create Job"/>
                </div>
            </div>

        </form>
    </x-card>
</x-layout>
