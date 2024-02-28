<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('build/assets/logo.png') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>kittens</title>
</head>

<body class="font-cabin" >
    <div class="container pt-2 px-4 mx-auto mb-8">
        <header class="flex justify-between items-center py-4">
            <div class="mx-2 flex items-center flex-grow gap-4">
                <a class="" href="{{ route('home') }}">
                    <img class="h-12" src="{{ asset('build/assets/logo.png') }}" alt="logo">
                </a>
                <form class="border-gray-600 border-1.5 rounded-lg" action="">
                    <span class="ml-2 pr-2 pl-3 py-1 rounded-lg bg-gray-300 ">
                        <button class="rounded-lg"> /</button>
                    </span>
                    <input id="input_main" class="border-none focus:ring-0 rounded-lg
                        " type="text" name="search" placeholder="Search...">
                    <script>
                        var input = document.getElementById('input_main');
                        $(document).on('keydown', function(e) {
                            if (e.keyCode === 111) { 
                                input.focus();
                            }
                        });
                    </script>
                </form>
            </div>
            <p>
                <a href="{{ route('home') }}">Home</a>
                @auth
                <a href="{{ route('posts.index') }}">Dashboard</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                @endauth
            </p>

        </header>
    </div>
    @yield('content')
</body>

</html>