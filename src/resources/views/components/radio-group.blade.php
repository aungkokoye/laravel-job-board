@if($showAll)
<label for="{{ $name }}" class="mb-1 flex items-center">
    <input type="radio"
           name="{{ $name }}"
           value=""
           @checked(!request($name))
           class="mr-2"
    />
    <span class="text-slate-500"> All </span>
</label>
@endif


@foreach($options as $option)
    <label for="{{ $name }}" class="mb-1 flex items-center">
        <input type="radio"
               name="{{ $name }}"
               value="{{ $option }}"
               @checked(request($name) === $option || $selected === $option)
               class="mr-2"
        />
        <span class="text-slate-500"> {{ ucfirst($option) }} </span>
    </label>
@endforeach

@error($name)
<span class="text-sm text-red-400">{{ $message }}</span>
@enderror
