<!DOCTYPE html>
<html lang="lt">
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> TODO check lang--}}
<head>
    <title>Teatro terminų žodynas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts TODO check fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css">
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased">
<section class="relative flex items-top justify-center
                bg-gray-100 dark:bg-gray-900
                sm:items-center py-4 sm:pt-0">
    <div class="inline fixed top-0 left-0 px-6 py-4">
        <img src="" alt="Logo#1">
        <img src="" alt="Logo#2">
    </div>
    <div class="inline">
        <h1><a href="/">Teatro terminų žodynas</a></h1>
    </div>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
{{--                @if (Route::has('register'))--}}
{{--                    TODO relocate register to dashboard--}}
{{--                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>--}}
{{--                @endif--}}
            @endauth
        </div>
    @endif
</section>

    {{ $slot }}

<footer>
    {{--        TODO footer--}}
    Footer placeholder
</footer>
</body>
