<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('build/assets/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>woowowow</title>
</head>

<body>
    <div class="container px-4 mx-auto">
        <header class="flex justify-between items-center py-4">
            <div class="flex items-center flex-grow gap-4">
                <a href="{{ route('home') }}">
                    <img class="h-12" src="{{ asset('build/assets/logo.png') }}" alt="logo">
                </a>
                <form action="">
                    <input class="focus:border-none rounded-lg focus:ring focus:ring-black
                    "
                        type="text" placeholder="Search...">
                </form>
            </div>
            <p>
                <a href="{{ route('home') }}">Home</a>
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            </p>

        </header>
        <div class="opacity-68 h-px mb-8"
            style="background: linear-gradient(to right,
        rgba(200,200,200,0) 0%,
        rgba(200,200,200,1) 30%,
        rgba(200,200,200,1) 70%,
        rgba(200,200,200,0) 100%,
        );">
        </div>
    </div>

    @yield('content')
</body>

</html>
