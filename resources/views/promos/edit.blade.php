@extends('layouts.app')

@section('content')
    <div class="min-h-screen py-8 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <div
                class="p-6 mb-8 shadow-sm bg-gradient-to-r from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-900 rounded-2xl">
                <div class="flex items-center space-x-4">
                    <div
                        class="flex items-center justify-center w-12 h-12 shadow-lg bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Pengaturan Promo</h1>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">Kelola informasi promo Anda</p>
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
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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

            <!-- Form -->
            <div class="mb-8 overflow-hidden bg-white shadow-xl dark:bg-gray-800 rounded-2xl">
                <form action="{{ route('promo.update') }}" method="POST" enctype="multipart/form-data" class="space-y-0">
                    @csrf

                    <div class="p-6 space-y-8 sm:p-8">
                        <!-- Name -->
                        <div class="space-y-2">
                            <label class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                Nama Promo
                            </label>
                            <input type="text" name="name" value="{{ old('name', $promo->name ?? '') }}"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 hover:border-blue-300 @error('name') border-red-500 focus:ring-red-500 @enderror"
                                placeholder="Masukkan nama promo..." required>
                            @error('name')
                                <p class="flex items-center mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="space-y-4">
                            <label class="flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                                Gambar Promo
                            </label>

                            <div class="relative">
                                <input type="file" name="image" id="imageInput" accept="image/*"
                                    class="absolute inset-0 z-10 w-full h-full opacity-0 cursor-pointer">
                                <div
                                    class="p-6 text-center transition-all duration-200 border-2 border-gray-300 border-dashed dark:border-gray-600 rounded-xl hover:border-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700">
                                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                        <span class="font-medium text-blue-600 hover:text-blue-500">Klik untuk upload</span>
                                        atau drag & drop
                                    </p>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG hingga 2MB</p>
                                </div>
                            </div>

                            <div class="relative">
                                <div class="flex items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                    <img id="previewImage"
                                        src="{{ !empty($promo->image) ? asset('storage/' . $promo->image) : 'https://via.placeholder.com/200x120?text=Preview+Promo' }}"
                                        alt="Preview Promo"
                                        class="object-contain transition-all duration-300 rounded-lg shadow-md max-h-32 hover:scale-105">
                                </div>
                            </div>

                            @error('image')
                                <p class="flex items-center text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div
                        class="px-6 py-6 border-t border-gray-200 bg-gray-50 dark:bg-gray-700 sm:px-8 dark:border-gray-600">
                        <div class="flex flex-col gap-4 sm:flex-row sm:justify-end">
                            <button type="button" onclick="window.history.back()"
                                class="w-full px-6 py-3 font-medium text-gray-700 transition-all duration-200 border border-gray-300 sm:w-auto dark:border-gray-600 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </button>

                            <button type="submit"
                                class="w-full px-8 py-3 font-medium text-white transition-all duration-200 transform shadow-lg sm:w-auto bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-700 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:shadow-xl hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed">
                                Simpan Promo
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Image Preview Script -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage');

            if (file) {
                if (!file.type.startsWith('image/')) {
                    alert('Please select a valid image file.');
                    this.value = '';
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
