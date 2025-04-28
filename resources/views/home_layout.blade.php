
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="bg-blue-950 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold"><a href="/"> TravelConneckt</a></h1>
            <nav class="flex gap-4 text-sm">
                <a href="{{ route('schedules') }}" class="hover:underline">Schedule</a>
                @if (Auth::user())
                    <a href="{{ route('logout') }}" class="hover:underline">
                        Logout
                    </a>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">
                       Login
                    </a>
                    <a href="{{ route('show.sign_up') }}"  class="hover:underline">
                       Sign up
                    </a>
                @endif
            </nav>
        </div>
    </header>
    <nav class="bg-blue-800 text-white py-3">
        <div class="container mx-auto flex flex-wrap justify-center gap-4">
            @foreach ($cities as $city)
                
            <button class="px-4 py-2 hover:underline">{{$city->name}}</button>
            @endforeach
        </div>
    </nav>
@yield("content")

<footer class="bg-blue-950 text-white py-4 text-center mt-10">
    &copy; 2025 TravelConneckt. All rights reserved.
</footer>
</body>
</html>