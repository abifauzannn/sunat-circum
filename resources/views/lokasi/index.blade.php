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
                                d="M17 9V7a5 5 0 00-10 0v2a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2v-7a2 2 0 00-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Daftar Lokasi</h1>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">Kelola cabang klinik</p>
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

            <!-- Data Table -->
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 rounded-2xl">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Tabel Lokasi</h2>
                    <div class="space-x-4">
                        <a href="{{ route('lokasi.create') }}"
                            class="px-4 py-2 text-sm font-medium text-white transition-all duration-200 shadow-lg bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-700 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            + Tambah Lokasi
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
                                    Nama Cabang</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-300">
                                    Alamat</th>
                                <th
                                    class="px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-300">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($lokasis as $lokasi)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                                        {{ $lokasi->nama_cabang }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                                        {{ $lokasi->alamat_cabang }}</td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('lokasi.edit', $lokasi->id) }}"
                                                class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Edit</a>
                                            <form action="{{ route('lokasi.destroy', $lokasi->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus lokasi ini?')"
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
                                    <td colspan="4"
                                        class="px-6 py-4 text-sm text-center text-gray-500 dark:text-gray-400">
                                        Belum ada lokasi tersedia.
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
