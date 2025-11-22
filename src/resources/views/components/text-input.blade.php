@props(['name', 'placeholder' => '', 'value' => '', 'type' => 'text', 'formRef' => null])

<div class="relative" x-data="{ value: '{{ $value }}' }">
    @if(!empty($formRef))
        <button type="submit" class="absolute top-0 right-0 h-full flex items-center"
                @click="$refs['input-{{ $name }}'].value='', $refs['{{ $formRef }}'].summit();">
            <span class="text-slate-500 text-lg mr-2 cursor-pointer"> x </span>
        </button>
    @endif
    <input x-ref="input-{{ $name }}"  id="{{ $name  }}" name="{{ $name  }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
           value="{{ $value }}"  x-model="value"
           class="w-full rounded-md pr-6
            @if($type === 'file')
                file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold
                file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 file:cursor-pointer
            @endif
            @error($name) border-red-400 @enderror"
    />
    @error($name)
        <span class="text-sm text-red-400">{{ $message }}</span>
    @enderror

</div>
