<div class="relative" x-data="{ value: '{{ $value }}' }">
    <button type="submit" class="absolute top-0 right-0 h-full flex items-center" @click="value = '' ">
        <span class="text-slate-500 text-lg mr-2"> x </span>
    </button>
    <input id="{{ $name  }}" name="{{ $name  }}" type="text" placeholder="{{ $placeholder }}"
           value="{{ $value }}" class="w-full rounded-md pr-6"  x-model="value"/>
</div>

