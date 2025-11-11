<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="container mx-auto px-4 py-10 max-w-screen-xl">
            <div class="rounded-md bg-gray-50 p-4 shadow-lg">
                <h1 class="text-2xl text-blue-400"> Hello World</h1>
            </div>

        </div>

    </body>
</html>
