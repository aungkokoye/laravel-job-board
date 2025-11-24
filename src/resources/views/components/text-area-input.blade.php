<textarea name="{{ $name }}" id="{{ $name }}" cols="{{ $cols }}" rows="{{ $rows }}"
          {{ $attributes->merge(['class' => 'w-full rounded-md']) }}
>{{ $value }}</textarea>

@error($name)
<span class="text-sm text-red-400">{{ $message }}</span>
@enderror
