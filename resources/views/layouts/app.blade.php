<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/sunatnano.png') }}" type="image/png">

    <title>Admin - Rumah Sunat Nano</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white border-b border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="min-h-screen pt-8 pb-16 bg-gray-100 dark:bg-gray-900">
            @yield('content')
        </main>
    </div>

    <!-- Additional styling to ensure consistent background -->
    <style>
        /* Ensure full height coverage */
        html,
        body {
            height: 100%;
            background-color: #f3f4f6;
            /* gray-100 */
            margin: 0;
            padding: 0;
        }

        /* Dark mode background */
        @media (prefers-color-scheme: dark) {

            html,
            body {
                background-color: #111827;
                /* gray-900 */
            }
        }

        /* Force gray background for all containers */
        .bg-gray-100 {
            background-color: #f3f4f6 !important;
        }

        .dark .bg-gray-900 {
            background-color: #111827 !important;
        }

        /* Remove any potential white backgrounds */
        * {
            box-sizing: border-box;
        }

        /* Ensure main content area has proper background */
        main {
            background-color: inherit;
        }
    </style>
</body>

</html>
