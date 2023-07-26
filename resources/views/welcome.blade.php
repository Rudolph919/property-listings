<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Listings - Homepage</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="py-4 bg-gray-300 navbar">
        <div class="flex justify-between mx-auto container-fluid">
            <div class="flex items-center">
                <a href="/" class="flex items-center ml-3 mr-3 font-semibold text-gray-700 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    <i class="fa-solid fa-bullseye fa-2xl"></i>
                    <h1 class="hidden pl-4 text-2xl md:block">Marketplace</h1>
                </a>
            </div>

            <div class="flex items-center">
                <div class="z-10 p-2 text-right md:p-6 lg:p-6 sm:top-0 sm:right-0">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Log in
                        </a>

                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Register
                        </a>
                    @endauth
                </div>
            </div>

        </div>
    </nav>

    <x-banner />

    <section class="py-10 bg-gray-200">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">Welcome to Bullseye Listings</h1>
            <p class="text-lg">Find your dream item/property today!</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-gray-200">
        <div class="container mx-auto text-center">
            <p class="text-gray-500">Property Listings &copy; 2023. All rights reserved.</p>
        </div>
    </footer>

    @stack('modals')
    @livewireScripts
</body>
</html>
