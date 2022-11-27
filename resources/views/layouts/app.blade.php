<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
        </div>
        <main>
            {{ $slot }}
        </main>

        @stack('modals')

        @livewireScripts
    </body>
</html>


<!--
<div class="bg-red-500 border-r fixed w-[18rem] h-screen">
        <div class="px-3">
            <img src="{{ asset('assets/logo.png') }}" alt="" class="h-20">
            <h1>IMAN</h1>
    
            <ul class="mt-5 text-zinc-800">
                <li class="p-3 rounded-lg bg-gradient-to-r from-cgreen via-cgreen/80 to-cyellow/80 text-white mb-1">
                    <a href="#" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="21" height="21">
                            <path class="fill-current"
                                d="M3 10h18v10.004c0 .55-.445.996-.993.996H3.993A.994.994 0 0 1 3 20.004V10zm6 2v2h6v-2H9zM2 4c0-.552.455-1 .992-1h18.016c.548 0 .992.444.992 1v4H2V4z" />
                        </svg>
                        <span>Assets</span>
                    </a>
                </li>
    
                <li class="p-3">
                    <a href="#" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="21" height="21">
                            <path class="fill-current"
                                d="M17 2v2h3.007c.548 0 .993.445.993.993v16.014c0 .548-.445.993-.993.993H3.993C3.445 22 3 21.555 3 21.007V4.993C3 4.445 3.445 4 3.993 4H7V2h10zM7 6H5v14h14V6h-2v2H7V6zm2 10v2H7v-2h2zm0-3v2H7v-2h2zm0-3v2H7v-2h2zm6-6H9v2h6V4z" />
                        </svg>
                        <span>Request Assets</span>
                    </a>
                </li>
    
                <li class="p-3">
                    <a href="#" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="21" height="21">
                            <path class="fill-current"
                                d="M8 20v1.932a.5.5 0 0 1-.82.385l-4.12-3.433A.5.5 0 0 1 3.382 18H18a2 2 0 0 0 2-2V8h2v8a4 4 0 0 1-4 4H8zm8-16V2.068a.5.5 0 0 1 .82-.385l4.12 3.433a.5.5 0 0 1-.321.884H6a2 2 0 0 0-2 2v8H2V8a4 4 0 0 1 4-4h10z" />
                        </svg>
                        <span>Borrow History</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
-->
