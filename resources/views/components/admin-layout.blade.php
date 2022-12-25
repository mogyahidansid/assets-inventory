<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<body class="font-rubik antialiased">
  <x-notifications z-index="z-50" />
  <x-dialog z-index="z-50" blur="md" align="center" />

  <div>
    <div class="relative z-40 md:hidden" role="dialog" aria-modal="true">

      <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

      <div class="fixed inset-0 z-40 flex">
        <div class="relative flex w-full max-w-xs flex-1 flex-col bg-gray-800 pt-5 pb-4">
          <div class="absolute top-0 right-0 -mr-12 pt-2">
            <button type="button"
              class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
              <span class="sr-only">Close sidebar</span>
              <!-- Heroicon name: outline/x-mark -->
              <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <div class="flex flex-shrink-0 items-center px-4">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
              alt="Your Company">
          </div>
          <div class="mt-5 h-0 flex-1 overflow-y-auto">
            <nav class="space-y-1 px-2">
              <a href="#"
                class="bg-gray-900 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <svg class="text-gray-300 mr-4 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                Dashboard
              </a>

              <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <svg class="text-gray-400 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                Team
              </a>

              <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <!-- Heroicon name: outline/folder -->
                <svg class="text-gray-400 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                </svg>
                Projects
              </a>

              <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <!-- Heroicon name: outline/calendar -->
                <svg class="text-gray-400 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                Calendar
              </a>

              <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <!-- Heroicon name: outline/inbox -->
                <svg class="text-gray-400 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                </svg>
                Documents
              </a>

              <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <!-- Heroicon name: outline/chart-bar -->
                <svg class="text-gray-400 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                </svg>
                Reports
              </a>
            </nav>
          </div>
        </div>

        <div class="w-14 flex-shrink-0" aria-hidden="true">
          <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
      </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div
        class="flex min-h-0 flex-1 flex-col bg-gradient-to-b from-green-500 via-green-600 to-green-800 bg-opacity-75">
        <div class="flex h-20 flex-shrink-0 items-center  space-x-2 px-4">
          <img class="h-14 w-auto" src="{{ asset('assets/IMAnLogo.png') }}" alt="Your Company">
          <h1 class="text-3xl font-extrabold text-white">IMAN</h1>
        </div>
        <div class="flex flex-1 flex-col overflow-y-auto">
          <nav class="flex-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

            <div class=" space-y-1 px-2 py-4">
              <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'bg-white text-gray-700 fill-gray-700' : ' text-white fill-white' }}  hover:bg-white hover:text-gray-700 hover:fill-gray-700  group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mr-3 flex-shrink-0 h-6 w-6">
                  <path fill="none" d="M0 0H24V24H0z" />
                  <path
                    d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2zm0 2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm3.833 3.337c.237-.166.559-.138.763.067.204.204.23.526.063.76-2.18 3.046-3.38 4.678-3.598 4.897-.586.585-1.536.585-2.122 0-.585-.586-.585-1.536 0-2.122.374-.373 2.005-1.574 4.894-3.602zM17.5 11c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm-11 0c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm2.318-3.596c.39.39.39 1.023 0 1.414-.39.39-1.024.39-1.414 0-.39-.39-.39-1.024 0-1.414.39-.39 1.023-.39 1.414 0zM12 5.5c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1z" />
                </svg>
                Dashboard
              </a>
              <a href="{{ route('admin.asset') }}"
                class="{{ request()->routeIs('admin.asset') ? 'bg-white text-gray-700 fill-gray-700' : ' text-white fill-white' }}  hover:bg-white hover:text-gray-700 hover:fill-gray-700  group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" mr-3 flex-shrink-0 h-6 w-6">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M22 20a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v16zm-11-5H4v4h7v-4zm9-4h-7v8h7v-8zm-9-6H4v8h7V5zm9 0h-7v4h7V5z" />
                </svg>
                Assets
              </a>
              <a href="{{ route('admin.ledger') }}"
                class="{{ request()->routeIs('admin.ledger') ? 'bg-white text-gray-700 fill-gray-700' : ' text-white fill-white' }}  hover:bg-white hover:text-gray-700 hover:fill-gray-700  group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" mr-3 flex-shrink-0 h-6 w-6">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M20.005 2C21.107 2 22 2.898 22 3.99v16.02c0 1.099-.893 1.99-1.995 1.99H4v-4H2v-2h2v-3H2v-2h2V8H2V6h2V2h16.005zM8 4H6v16h2V4zm12 0H10v16h10V4z" />
                </svg>
                Ledger
              </a>
              <a href="{{ route('admin.request') }}"
                class="{{ request()->routeIs('admin.request') || request()->routeIs('admin.manage-request') ? 'bg-white text-gray-700 fill-gray-700' : ' text-white fill-white' }}  hover:bg-white hover:text-gray-700 hover:fill-gray-700  group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mr-3 flex-shrink-0 h-6 w-6">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path d="M21 16l-6.003 6H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v13zm-2-1V4H5v16h9v-5h5z" />
                </svg>
                Requests Assets
              </a>
              <a href="{{ route('admin.borrow') }}"
                class="{{ request()->routeIs('admin.borrow') ? 'bg-white text-gray-700 fill-gray-700' : ' text-white fill-white' }}  hover:bg-white hover:text-gray-700 hover:fill-gray-700  group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mr-3 flex-shrink-0 h-6 w-6">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path d="M21 16l-6.003 6H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v13zm-2-1V4H5v16h9v-5h5z" />
                </svg>
                Borrowed Assets
              </a>
            </div>
            <div class="mt-5 border-t px-2 space-y-1 py-4">
              <a href="{{ route('admin.borrowers') }}"
                class="{{ request()->routeIs('admin.borrowers') ? 'bg-white text-gray-700 fill-gray-700' : ' text-white fill-white' }}  hover:bg-white hover:text-gray-700 hover:fill-gray-700  group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mr-3 flex-shrink-0 h-6 w-6">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path d="M5 20h14v2H5v-2zm7-2a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm0-2a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                </svg>
                Borrowers
              </a>
              <a href="{{ route('admin.reports') }}"
                class="{{ request()->routeIs('admin.reports') ? 'bg-white text-gray-700 fill-gray-700' : ' text-white fill-white' }}  hover:bg-white hover:text-gray-700 hover:fill-gray-700  group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mr-3 flex-shrink-0 h-6 w-6">
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M11 7h2v10h-2V7zm4 4h2v6h-2v-6zm-8 2h2v4H7v-4zm8-9H5v16h14V8h-4V4zM3 2.992C3 2.444 3.447 2 3.999 2H16l5 5v13.993A1 1 0 0 1 20.007 22H3.993A1 1 0 0 1 3 21.008V2.992z" />
                </svg>
                Reports
              </a>
            </div>



          </nav>
        </div>
      </div>
    </div>
    <div class="flex flex-col md:pl-64">
      <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow" x-data="{ notifModal: false }">
        <button type="button"
          class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
          <span class="sr-only">Open sidebar</span>
          <!-- Heroicon name: outline/bars-3-bottom-left -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
          </svg>
        </button>
        <div class="flex flex-1 justify-between px-12">
          <div class="flex flex-1">
            <div class="flex  items-center">
              <h1 class="text-2xl font-bold uppercase text-gray-700">Integrated Mindanaons Association for Natives</h1>
            </div>
          </div>
          <div class="ml-4 flex items-center md:ml-6">
            <livewire:notification />

            <!-- Profile dropdown -->
            <div class="relative ml-4" x-data="{ userdropdown: false }">
              <div>
                {{-- <button type="button" x-on:click="userdropdown = !userdropdown"
                  class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                  id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open user menu</span>
                  <img class="h-9 w-9 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">
                </button> --}}
                <button class="focus:ring-2 rounded-full">
                  <x-avatar md label="AD" x-on:click="userdropdown = !userdropdown"
                    x-on:click.away="userdropdown = false" />
                </button>
              </div>
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
                      <div class="">
                        <x-avatar md label="AD" />
                      </div>
                      <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</p>
                        <p class="text-xs font-medium text-gray-500">{{ auth()->user()->email }}</p>
                      </div>
                    </div>
                    <div class="mt-2 flex flex-col space-y-2 ">
                      <a href="{{ route('admin.profile') }}"
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
        </div>
      </div>


      <main class="flex-1">
        {{ $slot }}
      </main>
    </div>
  </div>

  @livewireScripts
  @stack('scripts')
</body>

</html>
