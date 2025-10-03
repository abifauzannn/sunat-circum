<nav x-data="{ open: false }"
    class="relative z-50 bg-white border-b border-gray-200 shadow-sm dark:bg-gray-900 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 group">
                        <div
                            class="flex items-center justify-center w-10 h-10 transition-all duration-300 rounded-lg shadow-lg bg-gradient-to-r from-blue-500 to-purple-600 group-hover:shadow-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="text-xl font-bold text-gray-900 transition-colors duration-300 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400">
                            KlinikApp
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex sm:items-center">
                    <!-- Dashboard -->
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="inline-flex items-center h-16 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 border-b-2 rounded-t-lg hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5a2 2 0 012-2h4a2 2 0 012 2v3H8V5z"></path>
                        </svg>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <!-- Klinik -->
                    <x-nav-link :href="route('klinik.form')" :active="request()->routeIs('klinik.*')"
                        class="inline-flex items-center h-16 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 border-b-2 rounded-t-lg hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                        {{ __('Klinik') }}
                    </x-nav-link>

                    <!-- Paket Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="inline-flex items-center h-16 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 border-b-2 border-transparent rounded-t-lg hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-800"
                            :class="{ 'bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white': open }">
                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Paket
                            <svg class="w-4 h-4 transition-transform duration-200 ms-1" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95" @click.outside="open = false"
                            class="absolute left-0 z-50 w-56 mt-1 overflow-hidden origin-top-left bg-white border border-gray-200 rounded-lg shadow-lg top-full dark:bg-gray-800 dark:border-gray-600">
                            <div class="py-1">
                                <a href="{{ route('metodes.index') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Metode
                                </a>
                                <a href="{{ route('paket.index') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    Daftar Paket
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Konten Website Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="inline-flex items-center h-16 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 border-b-2 border-transparent rounded-t-lg hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-800"
                            :class="{ 'bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white': open }">
                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                </path>
                            </svg>
                            Konten Web
                            <svg class="w-4 h-4 transition-transform duration-200 ms-1" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95" @click.outside="open = false"
                            class="absolute left-0 z-50 w-56 mt-1 overflow-hidden origin-top-left bg-white border border-gray-200 rounded-lg shadow-lg top-full dark:bg-gray-800 dark:border-gray-600">
                            <div class="py-1">
                                <a href="{{ route('banner.edit') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Banner
                                </a>
                                <a href="{{ route('why.index') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    Why Us
                                </a>
                                <a href="{{ route('layanans.index') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                        </path>
                                    </svg>
                                    Layanan
                                </a>
                                <a href="{{ route('fasilitas.index') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                    Fasilitas
                                </a>
                                <a href="{{ route('reviews.index') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                    Reviews
                                </a>
                                <a href="{{ route('dokters.index') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                    Dokter
                                </a>
                                <a href="{{ route('testimoni.edit') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.17 6A5.17 5.17 0 002 11.17V18h7v-6H6.5A2.5 2.5 0 019 9.5V6H7.17zm9 0A5.17 5.17 0 0011 11.17V18h7v-6h-2.5A2.5 2.5 0 0118 9.5V6h-1.83z" />
                                    </svg>

                                    Testimoni
                                </a>
                                <a href="{{ route('promo.edit') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 2l1 4h10l1-4h2l-1 4h1a1 1 0 011 1v2h-2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9H3V7a1 1 0 011-1h1L4 2h2zm3 7a3 3 0 006 0h-2a1 1 0 01-2 0H9z" />
                                    </svg>


                                    Promo
                                </a>
                                <a href="{{ route('lokasi.index') }}"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-4 h-4 text-gray-400 me-3" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 2a6 6 0 00-6 6c0 4.418 6 10 6 10s6-5.582 6-10a6 6 0 00-6-6zm0 8a2 2 0 110-4 2 2 0 010 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Lokasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Notification Button -->
                <button
                    class="relative p-2 text-gray-400 transition-colors duration-300 hover:text-gray-500 focus:outline-none focus:text-gray-500 me-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                    <span
                        class="absolute top-0 right-0 block w-3 h-3 bg-red-400 rounded-full ring-2 ring-white"></span>
                </button>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition-all duration-300 bg-white border border-transparent rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none hover:shadow">
                            <div class="flex items-center space-x-2">
                                <div
                                    class="flex items-center justify-center w-8 h-8 text-sm font-semibold text-white rounded-full bg-gradient-to-r from-blue-500 to-purple-600">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div class="hidden text-left md:block">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                            </div>
                            <div class="ms-2">
                                <svg class="w-4 h-4 transition-transform duration-200 fill-current"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-600">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                        </div>


                        <div class="border-t border-gray-100 dark:border-gray-600"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center text-red-600 hover:text-red-800 hover:bg-red-50">
                                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-200 ease-in-out rounded-lg dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden border-t border-gray-200 sm:hidden dark:border-gray-600"
        style="position: relative; z-index: 50;">
        <div class="pt-2 pb-3 space-y-1 bg-gray-50 dark:bg-gray-800">
            <!-- Dashboard -->
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center">
                <svg class="w-4 h-4 me-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                </svg>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <!-- Klinik -->
            <x-responsive-nav-link :href="route('klinik.form')" :active="request()->routeIs('klinik.*')" class="flex items-center">
                <svg class="w-4 h-4 me-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
                {{ __('Klinik') }}
            </x-responsive-nav-link>

            <!-- Mobile Paket Dropdown -->
            <div x-data="{ paketOpen: false }" class="space-y-1">
                <button @click="paketOpen = !paketOpen"
                    class="flex items-center w-full px-4 py-2 text-sm font-medium text-left text-gray-700 transition-colors duration-150 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
                    <svg class="w-4 h-4 me-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Paket
                    <svg class="w-4 h-4 transition-transform duration-200 ms-auto" :class="{ 'rotate-180': paketOpen }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="paketOpen" x-transition class="pl-8 mt-1 space-y-1">
                    <a href="{{ route('metodes.index') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-600 transition-colors duration-150 rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-3 h-3 text-gray-400 me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Metode
                    </a>
                    <a href="{{ route('paket.index') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-600 transition-colors duration-150 rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-3 h-3 text-gray-400 me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Daftar Paket
                    </a>
                </div>
            </div>

            <!-- Mobile Konten Web Dropdown -->
            <div x-data="{ kontenOpen: false }" class="space-y-1">
                <button @click="kontenOpen = !kontenOpen"
                    class="flex items-center w-full px-4 py-2 text-sm font-medium text-left text-gray-700 transition-colors duration-150 rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
                    <svg class="w-4 h-4 me-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                        </path>
                    </svg>
                    Konten Web
                    <svg class="w-4 h-4 transition-transform duration-200 ms-auto"
                        :class="{ 'rotate-180': kontenOpen }" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="kontenOpen" x-transition class="pl-8 mt-1 space-y-1">
                    <a href="{{ route('banner.edit') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-600 transition-colors duration-150 rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-3 h-3 text-gray-400 me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Banner
                    </a>
                    <a href="{{ route('why.index') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-600 transition-colors duration-150 rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-3 h-3 text-gray-400 me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Why Us
                    </a>
                    <a href="{{ route('layanans.index') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-600 transition-colors duration-150 rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-3 h-3 text-gray-400 me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                        Layanan
                    </a>
                    <a href="{{ route('fasilitas.index') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-600 transition-colors duration-150 rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-3 h-3 text-gray-400 me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                        Fasilitas
                    </a>
                    <a href="{{ route('reviews.index') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-600 transition-colors duration-150 rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-3 h-3 text-gray-400 me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        Reviews
                    </a>
                    <a href="{{ route('dokters.index') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4 text-gray-400 me-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        Dokter
                    </a>
                    <a href="{{ route('testimoni.edit') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4 text-gray-400 me-3" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.17 6A5.17 5.17 0 002 11.17V18h7v-6H6.5A2.5 2.5 0 019 9.5V6H7.17zm9 0A5.17 5.17 0 0011 11.17V18h7v-6h-2.5A2.5 2.5 0 0118 9.5V6h-1.83z" />
                        </svg>
                        Testimoni
                    </a>
                    <a href="{{ route('promo.edit') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4 text-gray-400 me-3" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 2l1 4h10l1-4h2l-1 4h1a1 1 0 011 1v2h-2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9H3V7a1 1 0 011-1h1L4 2h2zm3 7a3 3 0 006 0h-2a1 1 0 01-2 0H9z" />
                        </svg>

                        Promo
                    </a>
                    <a href="{{ route('lokasi.index') }}"
                        class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-150 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4 text-gray-400 me-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a6 6 0 00-6 6c0 4.418 6 10 6 10s6-5.582 6-10a6 6 0 00-6-6zm0 8a2 2 0 110-4 2 2 0 010 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Lokasi
                    </a>
                </div>
            </div>
        </div>

        <!-- Responsive User Options -->
        <div class="pt-4 pb-1 bg-white border-t border-gray-200 dark:border-gray-600 dark:bg-gray-900">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
