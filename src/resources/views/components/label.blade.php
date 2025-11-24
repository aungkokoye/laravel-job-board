<label
    for="{{ $for }}"
    {{ $attributes->merge(['class' => 'block mb-2 text-slate-400']) }}
>
    {{ $value }} {{ $required ? '*' : ''}}
</label>
