<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <style>
    [x-cloak] {
      display: none;
    }
  </style>
  @wireUiScripts

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Styles -->
  @livewireStyles
</head>

<body class="font-rubik antialiased h-full">
  <x-notifications z-index="z-50" />
  <x-dialog z-index="z-50" blur="md" align="center" />
  <div class="min-h-full">
    <header class=" bg-gradient-to-b from-green-500 via-green-600 to-green-800 pb-24">
      <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="relative flex items-center justify-center py-2 lg:justify-between">
          <!-- Logo -->
          <div class="absolute left-0 flex-shrink-0 flex items-center space-x-2 lg:static">
            <a href="#">
              <span class="sr-only">Your Company</span>
              <img class="h-14 w-auto" src="{{ asset('assets/IMAnLogo.png') }}" alt="">
            </a>
            <span class="uppercase font-bold text-white text-xl">Integrated Mindanaons Association for
              Natives (IMAN)</span>
          </div>

          <!-- Right section on desktop -->
          <div class="hidden lg:ml-4 lg:flex lg:items-center lg:pr-0.5">
            <button type="button"
              class="flex-shrink-0 rounded-full p-1 text-indigo-200 hover:bg-white hover:bg-opacity-10 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
              <span class="sr-only">View notifications</span>
              <!-- Heroicon name: outline/bell -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="relative ml-4 flex-shrink-0" x-data="{ userdropdown: false }">
              <div>
                @php
                  $user = auth()->user()->employeeInformation;
                @endphp
                <button class="focus:ring-2 rounded-full">
                  <x-avatar md class="uppercase" label="{{ $user->firstname[0] }}{{ $user->lastname[0] }}"
                    x-on:click="userdropdown = !userdropdown" x-on:click.away="userdropdown = false" />
                </button>
              </div>

              <!--
                Dropdown menu, show/hide based on menu state.
  
                Entering: ""
                  From: ""
                  To: ""
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div x-show="userdropdown" x-cloak x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-64 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">



                <div class="flex flex-shrink-0  px-4 py-2">
                  <div class="group block w-full flex-shrink-0">
                    <div class="flex items-center  pb-2 border-b">
                      <div class="uppercase">
                        <x-avatar md label="{{ $user->firstname[0] }}{{ $user->lastname[0] }}" />
                      </div>
                      <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">
                          {{ auth()->user()->employeeInformation->firstname }}
                          {{ auth()->user()->employeeInformation->lastname }}</p>
                        <p class="text-xs font-medium text-gray-500"> {{ '@' . auth()->user()->name }}</p>
                      </div>
                    </div>
                    <div class="mt-2 flex flex-col space-y-2 ">
                      <a href=""
                        class="flex space-x-1 items-center text-sm hover:text-green-800 hover:fill-green-800 text-gray-700 fill-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5">
                          <path fill="none" d="M0 0h24v24H0z" />
                          <path
                            d="M2 3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H2.992A.993.993 0 0 1 2 20.007V3.993zM4 5v14h16V5H4zm2 2h6v6H6V7zm2 2v2h2V9H8zm-2 6h12v2H6v-2zm8-8h4v2h-4V7zm0 4h4v2h-4v-2z" />
                        </svg>
                        <span>Your Profile</span>
                      </a>
                      <form method="POST" action="{{ route('logout') }}" role="none">
                        @csrf
                        <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
            this.closest('form').submit();"
                          class="flex space-x-1 items-center text-sm hover:text-green-800 hover:fill-green-800 text-gray-700 fill-gray-700">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                              d="M5 22a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v3h-2V4H6v16h12v-2h2v3a1 1 0 0 1-1 1H5zm13-6v-3h-7v-2h7V8l5 4-5 4z" />
                          </svg>
                          <span>Logout</span>
                        </a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <!-- Menu button -->
          <div class="absolute right-0 flex-shrink-0 lg:hidden">
            <!-- Mobile menu button -->
            <button type="button"
              class="inline-flex items-center justify-center rounded-md bg-transparent p-2 text-indigo-200 hover:bg-white hover:bg-opacity-10 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
              aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <!--
                Heroicon name: outline/bars-3
  
                Menu open: "hidden", Menu closed: "block"
              -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!--
                Heroicon name: outline/x-mark
  
                Menu open: "block", Menu closed: "hidden"
              -->
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
        <div class="hidden border-t border-white border-opacity-20 py-5 lg:block">
          <div class="grid grid-cols-3 items-center gap-8">
            <div class="col-span-2">
              <nav class="flex space-x-4">
                <!-- Current: "text-white", Default: "text-indigo-100" -->
                <a href="{{ route('employee.dashboard') }}"
                  class="{{ request()->routeIs('employee.dashboard') ? 'bg-white bg-opacity-100 text-green-600 ' : 'text-indigo-100' }} hover:bg-white  text-sm font-medium rounded-md hover:text-white   px-3 py-2 hover:bg-opacity-10">Home</a>

                <a href="{{ route('employee.request') }}"
                  class="{{ request()->routeIs('employee.request') ? 'bg-white bg-opacity-100 text-green-600 ' : 'text-indigo-100' }} hover:bg-white  text-sm font-medium rounded-md hover:text-white   px-3 py-2 hover:bg-opacity-10">Request
                  Assets</a>
                <a href="{{ route('employee.history') }}"
                  class="{{ request()->routeIs('employee.history') ? 'bg-white bg-opacity-100 text-green-600 ' : 'text-indigo-100' }} hover:bg-white  text-sm font-medium rounded-md hover:text-white   px-3 py-2 hover:bg-opacity-10">Transaction
                  History</a>
              </nav>
            </div>

          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on mobile menu state. -->
      <div class="lg:hidden">
        <!--
          Mobile menu overlay, show/hide based on mobile menu state.
  
          Entering: "duration-150 ease-out"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "duration-150 ease-in"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 z-20 bg-black bg-opacity-25" aria-hidden="true"></div>

        <!--
          Mobile menu, show/hide based on mobile menu state.
  
          Entering: "duration-150 ease-out"
            From: "opacity-0 scale-95"
            To: "opacity-100 scale-100"
          Leaving: "duration-150 ease-in"
            From: "opacity-100 scale-100"
            To: "opacity-0 scale-95"
        -->
        <div class="absolute inset-x-0 top-0 z-30 mx-auto w-full max-w-3xl origin-top transform p-2 transition">
          <div class="divide-y divide-gray-200 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="pt-3 pb-2">
              <div class="flex items-center justify-between px-4">
                <div>
                  <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company">
                </div>
                <div class="-mr-2">
                  <button type="button"
                    class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    {{-- <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: outline/x-mark -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                      stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg> --}}
                  </button>
                </div>
              </div>
              <div class="mt-3 space-y-1 px-2">
                <a href="#"
                  class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Home</a>
                <a href="#"
                  class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Profile</a>
                <a href="#"
                  class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Resources</a>
                <a href="#"
                  class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Company
                  Directory</a>
                <a href="#"
                  class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Openings</a>
              </div>
            </div>
            <div class="pt-4 pb-2">
              <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                  <img class="h-10 w-10 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">
                </div>
                <div class="ml-3 min-w-0 flex-1">
                  <div class="truncate text-base font-medium text-gray-800">Tom Cook</div>
                  <div class="truncate text-sm font-medium text-gray-500">tom@example.com</div>
                </div>
                <button type="button"
                  class="ml-auto flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                  <span class="sr-only">View notifications</span>
                  <!-- Heroicon name: outline/bell -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                  </svg>
                </button>
              </div>
              <div class="mt-3 space-y-1 px-2">
                <a href="#"
                  class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Your
                  Profile</a>

                <a href="#"
                  class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Settings</a>

                <a href="#"
                  class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-gray-800">Sign
                  out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main class="-mt-24 pb-8">
      <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h1 class="sr-only">Page title</h1>
        <!-- Main 3 column grid -->
        <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
          <!-- Left column -->
          <div class="grid grid-cols-1 gap-4 lg:col-span-3">
            <section aria-labelledby="section-1-title">
              <h2 class="sr-only" id="section-1-title">Section title</h2>
              <div class="overflow-hidden rounded-lg bg-white shadow">
                {{ $slot }}
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="border-t border-gray-200 py-8 text-center text-sm text-gray-500 sm:text-left"><span
            class="block sm:inline">&copy; 2022 Integrated Mindanaons Association for Natives (IMAN)</span> <span
            class="block sm:inline">All rights
            reserved.</span></div>
      </div>
    </footer>
  </div>

  @livewireScripts
</body>

</html>
