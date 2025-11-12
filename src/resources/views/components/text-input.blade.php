<div class="relative" x-data="{ value: '{{ $value }}' }">
    @if(!empty($formRef))
        <button type="submit" class="absolute top-0 right-0 h-full flex items-center"
                @click="$refs['input-{{ $name }}'].value='', $refs['{{ $formRef }}'].summit();">
            <span class="text-slate-500 text-lg mr-2 cursor-pointer"> x </span>
        </button>
    @endif
    <input x-ref="input-{{ $name }}"  id="{{ $name  }}" name="{{ $name  }}" type="text" placeholder="{{ $placeholder }}"
           value="{{ $value }}" class="w-full rounded-md pr-6"  x-model="value"/>
</div>
