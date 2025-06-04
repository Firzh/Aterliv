<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Återliv') }}</title>

    <link rel="icon" href="{{ asset('images/LATERLIV.png') }}" type="image/png"> {{-- Added a favicon for better branding --}}

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" /> {{-- Added more font weights for versatility --}}

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Optional: Custom scrollbar for a polished look, adapts to dark mode */
        body::-webkit-scrollbar {
            width: 8px;
            height: 8px; /* For horizontal scroll if needed */
        }

        body::-webkit-scrollbar-track {
            background: #f0fdf4; /* green-50 */
        }

        body::-webkit-scrollbar-thumb {
            background-color: #34d399; /* green-500 */
            border-radius: 4px;
            border: 2px solid #f0fdf4; /* green-50 */
        }

        body::-webkit-scrollbar-thumb:hover {
            background-color: #10b981; /* green-600 */
        }

        /* Ensure smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased bg-white transition-all duration-300 ease-in-out overflow-x-hidden"> {{-- Added overflow-x-hidden to prevent horizontal scroll issues on mobile --}}

    @include('layouts.guest-nav')


    <main class="w-full px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        @yield('content')
    </main>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, // Whether animation should happen only once - while scrolling down
            duration: 1000, // values from 0 to 3000, with step 50ms
            easing: 'ease-in-out', // default easing for AOS animations
            delay: 100, // global animation delay in ms
            offset: 120, // offset (in px) from the top of the screen where the animation should start
            disable: 'mobile' // You can disable AOS on mobile if animations are too heavy
            // disable: window.innerWidth < 768 // Or disable based on screen width
        });

    </script>
</body>
</html>