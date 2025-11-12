<nav class="px-4 py-2">
    <ul class="flex items-center space-x-4 text-slate-500">
        <li class="hover:text-blue-400">
            <a href="{{ route('jobs.index') }}">
                Home
            </a>
        </li>

        @foreach ($links as $label => $url)
            <li> >> </li>
            <li class="hover:text-blue-400">
                <a href="{{ $url }}">
                    {{ $label }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
