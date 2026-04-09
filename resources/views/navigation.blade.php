<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-xl">
    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">
        Main
    </h1>

    <div class="grid grid-cols-1 gap-4">

        <a href="{{ route('posts') }}"
           class="bg-blue-600 hover:bg-blue-800 text-white text-center py-3 rounded-lg font-semibold">
            CRUD
        </a>
        <a href="{{ route('about') }}"
           class="bg-blue-600 hover:bg-blue-800 text-white text-center py-3 rounded-lg font-semibold">
            BD
        </a>

        <a href="{{ route('demo.livewire') }}"
           class="bg-indigo-500 hover:bg-indigo-600 text-white text-center py-3 rounded-lg font-semibold">
            Livewire
        </a>
    </div>
</div>

</body>
</html>
