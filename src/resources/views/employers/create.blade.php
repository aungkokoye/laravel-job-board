<x-layout>
    <div class="mb-4">
        <x-breadcrumbs :links="[
            'Employer Register'     => '#'
        ]" />
    </div>

    <x-card>
        <h2 class="text-slate-400 text-lg text-center mb-4"> Employer Register </h2>
        <form action="{{ route('employer.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="mb-6">
                <x-label for="company_name" value="Company Name:" :required="true"/>
                <x-text-input id="company_name" name="company_name" type="text"/>
            </div>

            <div>
                <x-long-button value="Save" />
            </div>
        </form>
    </x-card>
</x-layout>
