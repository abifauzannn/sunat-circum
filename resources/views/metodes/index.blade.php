@extends('layouts.app')

@section('content')
    <div class="min-h-screen py-8 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div
                class="p-6 mb-8 shadow-sm bg-gradient-to-r from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-900 rounded-2xl">
                <div class="flex items-center space-x-4">
                    <div
                        class="flex items-center justify-center w-12 h-12 shadow-lg bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v10a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Daftar Metode</h1>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">Kelola daftar metode sunat</p>
                    </div>
                </div>
            </div>

            <!-- Flash Messages -->
            @if (session('success'))
                <div
                    class="p-4 mb-6 text-green-800 border border-green-200 shadow-sm bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl animate-fade-in">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 me-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div
                    class="p-4 mb-6 text-red-800 border border-red-200 shadow-sm bg-gradient-to-r from-red-50 to-rose-50 rounded-xl">
                    <div class="flex items-start">
                        <svg class="h-5 w-5 text-red-600 me-3 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h3 class="mb-2 font-medium">Terdapat beberapa kesalahan:</h3>
                            <ul class="space-y-1 text-sm list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Data Table -->
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 rounded-2xl">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Tabel Metode</h2>
                    <div class="space-x-4">
                        <a href="{{ route('metodes.create') }}"
                            class="px-4 py-2 text-sm font-medium text-white transition-all duration-200 shadow-lg bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-700 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            + Tambah Metode
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                    #</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                    Nama</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                    Deskripsi</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                    Gambar</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-300">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($metodes as $metode)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $metode->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                                        {{ $metode->description }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                                        @if ($metode->image)
                                            <img src="{{ asset('storage/' . $metode->image) }}" alt="{{ $metode->name }}"
                                                class="object-cover w-16 h-16 rounded-lg shadow-md">
                                        @else
                                            <span class="italic text-gray-400">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('metodes.edit', $metode->id) }}"
                                                class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Edit</a>
                                            <form action="{{ route('metodes.destroy', $metode->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus metode ini?')"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-6 py-4 text-sm text-center text-gray-500 dark:text-gray-400">
                                        Belum ada metode tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
