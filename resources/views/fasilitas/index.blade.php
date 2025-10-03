@extends('layouts.app')

@section('content')
    <div class="min-h-screen py-8 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <div
                class="p-6 mb-8 shadow-sm bg-gradient-to-r from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-900 rounded-2xl">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Daftar Fasilitas</h1>
                <p class="mt-1 text-gray-600 dark:text-gray-300">Kelola fasilitas yang tersedia</p>
            </div>

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

            <!-- Table -->
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 rounded-2xl">
                <div class="flex items-center justify-between px-6 py-4 border-b dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Tabel Fasilitas</h2>
                    <a href="{{ route('fasilitas.create') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-xl hover:bg-blue-700">
                        + Tambah Fasilitas
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-sm font-medium text-left text-gray-700 dark:text-gray-300">#</th>
                                <th class="px-6 py-3 text-sm font-medium text-left text-gray-700 dark:text-gray-300">Gambar
                                </th>
                                <th class="px-6 py-3 text-sm font-medium text-left text-gray-700 dark:text-gray-300">Nama
                                    Fasilitas</th>
                                <th class="px-6 py-3 text-sm font-medium text-left text-gray-700 dark:text-gray-300">
                                    Deskripsi</th>
                                <th class="px-6 py-3 text-sm font-medium text-center text-gray-700 dark:text-gray-300">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($fasilitas as $item)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-sm">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                class="object-cover w-16 h-16 rounded-lg">
                                        @else
                                            <span class="text-gray-500">No Image</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm">{{ $item->nama_fasilitas }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $item->deskripsi }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('fasilitas.edit', $item->id) }}"
                                                class="px-3 py-1 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">Edit</a>
                                            <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus fasilitas ini?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada fasilitas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
