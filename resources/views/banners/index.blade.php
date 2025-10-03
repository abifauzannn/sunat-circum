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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4h18M4 8h16v12a2 2 0 01-2 2H6a2 2 0 01-2-2V8zm4 4h.01M12 12h.01M16 12h.01M8 16h8" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Pengaturan Banner</h1>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">Atur konten banner utama yang tampil di halaman
                            depan</p>
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

            <!-- Banner Form -->
            <div class="p-8 bg-white shadow-xl dark:bg-gray-800 rounded-2xl">
                <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Media Preview -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Media Saat
                            Ini</label>
                        <div class="flex items-center space-x-4">
                            @if ($banner->type === 'image')
                                <img src="{{ asset('storage/' . $banner->media) }}"
                                    class="object-cover w-40 h-40 rounded-lg shadow-md">
                            @elseif ($banner->type === 'video')
                                <video class="w-40 h-40 rounded-lg shadow-md" controls>
                                    <source src="{{ asset('storage/' . $banner->media) }}" type="video/mp4">
                                    Browser tidak mendukung video.
                                </video>
                            @else
                                <span class="text-gray-500">Belum ada media</span>
                            @endif
                        </div>
                    </div>

                    <!-- Upload Media -->
                    <div>
                        <label for="media" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Ganti
                            Media</label>
                        <input type="file" name="media" id="media"
                            class="block w-full px-3 py-2 text-sm border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                        <p class="mt-1 text-xs text-gray-500">Format: jpg, png, mp4 (opsional, biarkan kosong jika tidak
                            diganti)</p>
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Judul</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $banner->title) }}"
                            class="block w-full px-4 py-2 text-sm border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <!-- Link -->
                    <div>
                        <label for="link"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Link</label>
                        <input type="url" name="link" id="link" value="{{ old('link', $banner->link) }}"
                            class="block w-full px-4 py-2 text-sm border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-2 text-sm font-medium text-white transition-all duration-200 transform shadow-lg bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-700 hover:to-indigo-700 hover:scale-105">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
    </style>
@endsection
