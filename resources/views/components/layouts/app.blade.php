<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <nav>
        <!-- <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('login') }}">Login</a> -->
    </nav>

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
