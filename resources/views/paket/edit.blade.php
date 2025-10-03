@extends('layouts.app')

@section('content')
    <div class="min-h-screen py-8 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <div
                class="p-6 mb-8 shadow-sm bg-gradient-to-r from-yellow-50 to-orange-100 dark:from-gray-800 dark:to-gray-900 rounded-2xl">
                <div class="flex items-center space-x-4">
                    <div
                        class="flex items-center justify-center w-12 h-12 shadow-lg bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5h2m-1 0v14m-7-7h14" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Paket</h1>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">Perbarui data paket klinik Anda</p>
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

            <!-- Main Form -->
            <div class="mb-8 overflow-hidden bg-white shadow-xl dark:bg-gray-800 rounded-2xl">
                <form action="{{ route('paket.update', $paket->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-6 space-y-8 sm:p-8">
                        <!-- Image Upload -->
                        <div class="space-y-4">
                            <label class="flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                                Gambar Paket
                            </label>
                            <div class="relative">
                                <input type="file" name="image" id="imageInput" accept="image/*"
                                    class="absolute inset-0 z-10 w-full h-full opacity-0 cursor-pointer">
                                <div
                                    class="p-6 text-center transition-all duration-200 border-2 border-gray-300 border-dashed dark:border-gray-600 rounded-xl hover:border-yellow-400 hover:bg-yellow-50 dark:hover:bg-gray-700">
                                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                        <span class="font-medium text-yellow-600 hover:text-yellow-500">Klik untuk
                                            ganti</span>
                                        atau drag & drop
                                    </p>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG hingga 2MB</p>
                                </div>
                            </div>

                            <div class="relative">
                                <div class="flex items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                    <img id="previewImage"
                                        src="{{ $paket->image ? asset('storage/' . $paket->image) : 'https://via.placeholder.com/200x120?text=Preview+Image' }}"
                                        alt="Preview Image"
                                        class="object-contain transition-all duration-300 rounded-lg shadow-md max-h-32 hover:scale-105">
                                </div>
                            </div>
                            @error('image')
                                <p class="flex items-center text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama Paket -->
                        <div class="space-y-2">
                            <label class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                Nama Paket
                            </label>
                            <input type="text" name="nama_paket" value="{{ old('nama_paket', $paket->nama_paket) }}"
                                class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                                placeholder="Masukkan nama paket..." required>
                        </div>

                        <!-- Harga -->
                        <div class="space-y-2">
                            <label class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                Harga (Rp)
                            </label>
                            <input type="number" name="price" value="{{ old('price', $paket->price) }}"
                                class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                                placeholder="Masukkan harga paket..." required>
                        </div>

                        <!-- Bestseller -->
                        <div class="flex items-center">
                            <input type="checkbox" name="is_bestseller" id="is_bestseller" value="1"
                                class="w-5 h-5 text-yellow-600 border-gray-300 rounded focus:ring-yellow-500 dark:bg-gray-700 dark:border-gray-600"
                                {{ old('is_bestseller', $paket->is_bestseller) ? 'checked' : '' }}>
                            <label for="is_bestseller" class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">
                                Tandai sebagai paket terlaris
                            </label>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div
                        class="px-6 py-6 border-t border-gray-200 bg-gray-50 dark:bg-gray-700 sm:px-8 dark:border-gray-600">
                        <div class="flex flex-col gap-4 sm:flex-row sm:justify-end">
                            <a href="{{ route('paket.index') }}"
                                class="w-full px-6 py-3 font-medium text-gray-700 transition-all duration-200 border border-gray-300 sm:w-auto dark:border-gray-600 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </a>
                            <button type="submit"
                                class="w-full px-8 py-3 font-medium text-white transition-all duration-200 transform shadow-lg sm:w-auto bg-gradient-to-r from-yellow-600 to-orange-600 rounded-xl hover:from-yellow-700 hover:to-orange-700 focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 hover:shadow-xl hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed">
                                Update Paket
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script Preview -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                preview.src =
                    "{{ $paket->image ? asset('storage/' . $paket->image) : 'https://via.placeholder.com/200x120?text=Preview+Image' }}";
            }
        });
    </script>
@endsection
