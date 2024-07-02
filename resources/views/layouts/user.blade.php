<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://unpkg.com/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Bootstrap Icons -->
    <style>
        /* Your custom styles can be added here */
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 text-blue-600 font-bold ml-2">
                            DOMPET DIGITAL
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'text-blue-600 font-bold' : 'text-gray-600' }} px-3 py-2 rounded-md text-sm font-medium">Home</a>
                                <a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'text-blue-600 font-bold' : 'text-gray-600' }} px-3 py-2 rounded-md text-sm font-medium">About</a>
                                <a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'text-blue-600 font-bold' : 'text-gray-600' }} px-3 py-2 rounded-md text-sm font-medium">Contact Me</a>
                                @auth
                                <a href="{{ route('user.penilaian.index') }}" class="{{ Request::is('penilaian-saw') ? 'text-blue-600 font-bold' : 'text-gray-600' }} px-3 py-2 rounded-md text-sm font-medium">Penilaian SAW</a>
                                <a href="{{ url('/profile') }}" class="{{ Request::is('profile') ? 'text-blue-600 font-bold' : 'text-gray-600' }} px-3 py-2 rounded-md text-sm font-medium">MY Profile</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:flex ml-auto items-center">
                        @auth
                        <div class="px-4 py-2 text-sm leading-5 font-medium text-gray-900">{{ Auth::user()->name }}</div>
                        <div x-data="{ show: false }" @click.away="show = false" class="ml-3 relative">
                            <div>
                                <button @click="show = !show" type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="https://media.istockphoto.com/id/1341442407/id/vektor/ikon-3d-simbol-manusia-abstrak-avatar-sosial-untuk-komunikasi-online.jpg?s=1024x1024&w=is&k=20&c=PlPmJfS3PZkEI-hvFL5os6FpdHdCxI7Pei7eo8WBgB0=" alt="">
                                </button>
                            </div>
                            <div x-show="show" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                            </div>
                        </div>
                        @else
                        <a href="{{ route('login') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Log in</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Register</a>
                        @endif
                        @endauth
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'text-blue-600 font-bold' : 'text-gray-600' }} block px-3 py-2 rounded-md text-base font-medium">Home</a>
                    <a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'text-blue-600 font-bold' : 'text-gray-600' }} block px-3 py-2 rounded-md text-base font-medium">About</a>
                    <a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'text-blue-600 font-bold' : 'text-gray-600' }} block px-3 py-2 rounded-md text-base font-medium">Contact Me</a>
                    @auth
                    <a href="{{ url('/profile') }}" class="{{ Request::is('profile') ? 'text-blue-600 font-bold' : 'text-gray-600' }} block px-3 py-2 rounded-md text-base font-medium">MY Profile</a>
                    @endauth
                </div>
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">angga</div>
                            <div class="text-sm font-medium leading-none text-gray-400">karevagalvansa@gmail.com</div>
                        </div>
                    </div>
                    <div class="mt-4 px-2 space-y-1 sm:px-3">
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-gray-800">Facebook</a>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-gray-800">Twitter</a>
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-gray-800">Instagram</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-1">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-center md:text-left mb-4 md:mb-0">
                        &copy; Website Spk SAW (Dompet Digital).
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bell and Greeting -->
    <div x-data="{ showBell: true }" x-show="showBell" class="fixed bottom-0 right-0 mr-6 mb-6 z-50">
        <button @click="showBell = false" class="bg-blue-600 text-white rounded-full p-2 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <i class="fas fa-bell"></i>
        </button>
        <div class="absolute bottom-0 right-0 mb-16 bg-white shadow-lg rounded-lg py-3 px-4 w-60">
            <p class="text-sm text-gray-600">Selamat datang di website penilaian dompet digital saw.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    </script>
</body>
</html>
