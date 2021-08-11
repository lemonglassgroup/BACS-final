<!DOCTYPE html>
<html lang="lt">
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> TODO check lang--}}
<head>
    <title>Teatro terminų žodynas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles TODO optimize styles package -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
{{--    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}
<!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased">
<section class="flex items-center justify-around
                bg-gray-100 dark:bg-gray-900
                sm:items-center sm:pt-0">
    <div class="flex top-0 left-0 px-6 py-4">
        <img src="" alt="Logo#1">
        <img src="" alt="Logo#2">
    </div>
    <div class="inline">
        <h1><a href="/">Teatro terminų žodynas</a></h1>
    </div>
    @if (Route::has('login'))
        <div class="hidden top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Nustatymai</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Prisijungti</a>
            @endauth
        </div>
    @endif
</section>

{{ $slot }}

</body>
