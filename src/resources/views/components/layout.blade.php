<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style type="text/tailwindcss">
        .btn-m {
            @apply rounded-md text-center px-4 py-2 font-medium ring-1 shadow-sm;
        }

        .btn-l {
            @apply rounded-lg text-center px-4 py-2 font-medium ring-1 shadow-sm;
        }

        .btn-primary {
            @apply bg-blue-400 text-white hover:bg-blue-700;
        }

        .btn-success {
            @apply bg-green-400 text-white hover:bg-green-700;
        }

        .btn-danger {
            @apply bg-red-400 text-white hover:bg-red-700;
        }

        .btn-default {
            @apply bg-gray-400 text-white hover:bg-gray-700;
        }
    </style>
</head>
<body>
<div class="container mx-auto px-4 py-10 max-w-screen-xl bg-gray-100">
    {{ $slot }}
</div>

</body>
</html>
