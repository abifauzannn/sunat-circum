@extends('layouts.app')

@section('content')
    <div class="px-5 md:px-0">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Dashboard
                </h2>
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    {{ now()->format('l, d F Y') }}
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="mb-6 overflow-hidden shadow-lg bg-gradient-to-r from-blue-500 to-purple-600 sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                    <p class="mt-2 text-blue-100">Kelola data klinik Anda dengan mudah dan efisien</p>
                </div>
            </div>


        </div>
    </div>
@endsection
