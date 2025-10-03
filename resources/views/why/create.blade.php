@extends('layouts.app')

@section('content')
    <div class="min-h-screen py-8 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-3xl px-4 mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <div
                class="p-6 mb-8 shadow-sm bg-gradient-to-r from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-900 rounded-2xl">
                <div class="flex items-center space-x-4">
                    <div
                        class="flex items-center justify-center w-12 h-12 shadow-lg bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Why</h1>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">Isi form untuk menambahkan why baru</p>
                    </div>
                </div>
            </div>

            <!-- Error Alert -->
            @if ($errors->any())
                <div
                    class="p-4 mb-6 text-red-800 border border-red-200 shadow-sm bg-gradient-to-r from-red-50 to-rose-50 rounded-xl">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-red-600 me-3 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h3 class="mb-2 font-medium">Terdapat kesalahan:</h3>
                            <ul class="space-y-1 text-sm list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <div class="p-6 bg-white shadow-xl dark:bg-gray-800 rounded-2xl">
                <form action="{{ route('why.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Nama why -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Nama
                            why</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="block w-full px-4 py-2 text-gray-900 border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                            required>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('why.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-500">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2 text-sm font-medium text-white transition-all duration-200 shadow-lg bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-700 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
