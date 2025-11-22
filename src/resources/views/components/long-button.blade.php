<button type="{{ $type }}"
    {{ $attributes->merge(['class' => 'btn btn-m w-full cursor-pointer  text-slate-500 mb-4 border-1
                border-slate-200 p-2 rounded-md hover:bg-green-50 bg-slate-50']) }}
>
    {{ $value }}
</button>
