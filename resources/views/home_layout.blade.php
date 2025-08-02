
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('CSS/app.css') }}">


    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
            {{-- bulles --}}
    <div class="full-page-background">
        <div class="area w-full h-screen absolute bg-gradient-to-l from-[#8f94fb] to-[#4e54c8] -z-10">
            <ul class="circles relative w-full h-full overflow-hidden">
                  <li class="circle circle1"></li>
                  <li class="circle circle2"></li>
                  <li class="circle circle3"></li>
                  <li class="circle circle4"></li>
                  <li class="circle circle5"></li>
                  <li class="circle circle6"></li>
                  <li class="circle circle7"></li>
                  <li class="circle circle8"></li>
                  <li class="circle circle9"></li>
                  <li class="circle circle10"></li>
                </ul>
        </div>
    </div>

            {{-- /bulles --}}
    <div class="page-content">
    <header class="bg-blue-900 text-white py-8 shadow-lg">
        

        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-4xl font-bold"><a href="/"> TravelConneckt</a></h1>
            <nav class="flex gap-6 text-sm items-center">
                <a href="{{ route('reservations') }}" class="hover:underline">Reservations</a>
                @if (Auth::user())
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            <span class="flex items-center">
                                <i class="fas fa-user-circle text-xl mr-2"></i>
                                <span>Profile</span>
                            </span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        
                        <div x-show="open"
                             @click.away="open = false"
                             class="absolute right-0 mt-2 w-64 bg-white rounded-md shadow-lg py-2 z-50 text-gray-800"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95">
                            
                            <div class="px-4 py-3 border-b border-gray-200">
                                <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <div class="py-2">
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i> My Profile
                                </a>
                                <a href="{{ route('reservations') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
                                    <i class="fas fa-ticket-alt mr-2"></i> My Reservations
                                </a>
                               
                            </div>
                            
                            <div class="py-1 border-t border-gray-200">
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>
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
    


@yield("content")



<footer class="bg-blue-900 text-gray-200">
    <div class="container mx-auto px-6 py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="mb-6 md:mb-0">
                <a href="#" class="text-3xl font-bold tracking-wide text-white">
                    TravelConnect
                </a>
                <p class="mt-4 text-white">
                    Connecter les voyageurs, une destination à la fois.
                </p>
            </div>

            <div class="mb-6 md:mb-0">
                <h5 class="text-xl font-semibold mb-4 text-white">Liens rapides</h5>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Accueil</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">À propos</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Services</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Trajets</a></li>
                </ul>
            </div>

            <div class="mb-6 md:mb-0">
                <h5 class="text-xl font-semibold mb-4 text-white">Informations</h5>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Termes et Conditions</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Politique de confidentialité</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Contact</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">FAQ</a></li>
                </ul>
            </div>

            <div>
                <h5 class="text-xl font-semibold mb-4 text-white">Suivez-nous</h5>
                <div class="flex space-x-4">
                    <a href="#" class="text-2xl hover:text-white transition-colors duration-300">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-2xl hover:text-white transition-colors duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-2xl hover:text-white transition-colors duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-8 border-gray-700" />
        <div class="text-center text-gray-400">
            &copy; 2025 TravelConnect. Tous droits réservés.
        </div>
    </div>
</footer>



</div>
</body>
</html>