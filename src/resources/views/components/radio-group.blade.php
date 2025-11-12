<label for="{{ $name }}" class="mb-1 flex items-center">
    <input type="radio"
           name="{{ $name }}"
           value=""
           @checked(!request($name))
           class="mr-2"
    />
    <span class="text-slate-500"> All </span>
</label>


@foreach($options as $option)
    <label for="{{ $name }}" class="mb-1 flex items-center">
        <input type="radio"
               name="{{ $name }}"
               value="{{ $option }}"
               @checked(request($name) === $option)
               class="mr-2"
        />
        <span class="text-slate-500"> {{ ucfirst($option) }} </span>
    </label>
@endforeach
