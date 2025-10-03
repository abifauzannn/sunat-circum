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
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5l3 3M12 12l9-9">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Banner</h1>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">Perbarui Informasi Banner</p>
                    </div>
                </div>
            </div>

            <!-- Main Form -->
            <div class="mb-8 overflow-hidden bg-white shadow-xl dark:bg-gray-800 rounded-2xl">
                <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-6 space-y-8 sm:p-8">

                        <!-- Title -->
                        <div class="space-y-2">
                            <label class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                Judul Banner
                            </label>
                            <input type="text" name="title" value="{{ old('title', $banner->title) }}"
                                class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                                placeholder="Masukkan judul banner..." required>
                        </div>

                        <!-- Link -->
                        <div class="space-y-2">
                            <label class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                Link Banner
                            </label>
                            <input type="text" name="link" value="{{ old('link', $banner->link) }}"
                                class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                                placeholder="https://example.com">
                        </div>

                        <!-- Type -->
                        <div class="space-y-2 hidden">
                            <label class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                Jenis Banner
                            </label>
                            <select name="type" id="bannerType"
                                class="w-full px-4 py-3 border rounded-xl dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500">
                                <option value="image" {{ old('type', $banner->type) === 'image' ? 'selected' : '' }}>Gambar
                                </option>
                                <option value="video" {{ old('type', $banner->type) === 'video' ? 'selected' : '' }}>Video
                                </option>
                            </select>
                        </div>

                        <!-- Media Sekarang -->
                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                                Media Saat Ini
                            </label>
                            <div class="flex justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                @if ($banner->type === 'image')
                                    <img src="{{ asset('storage/' . $banner->media) }}" alt="{{ $banner->title }}"
                                        class="rounded-lg shadow-md max-h-40">
                                @elseif ($banner->type === 'video')
                                    <video controls class="rounded-lg shadow-md max-h-40">
                                        <source src="{{ asset('storage/' . $banner->media) }}" type="video/mp4">
                                    </video>
                                @endif
                            </div>
                        </div>

                        <!-- Upload Baru -->
                        <div id="uploadWrapper" class="space-y-4">
                            <label class="flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                                Upload Media Baru (Opsional)
                            </label>
                            <div class="relative">
                                <input type="file" name="media" id="mediaInput" accept="image/*,video/*"
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
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG, MP4 hingga 5MB
                                    </p>
                                </div>
                            </div>

                            <!-- Preview Baru -->
                            <div class="relative">
                                <div class="flex items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                    <img id="previewImage" src="https://via.placeholder.com/200x120?text=Preview+Image"
                                        alt="Preview Image"
                                        class="hidden object-contain transition-all duration-300 rounded-lg shadow-md max-h-32 hover:scale-105">
                                    <video id="previewVideo" controls class="hidden rounded-lg shadow-md max-h-40">
                                        <source src="" type="video/mp4">
                                        Browser tidak mendukung video preview.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div
                        class="px-6 py-6 border-t border-gray-200 bg-gray-50 dark:bg-gray-700 sm:px-8 dark:border-gray-600">
                        <div class="flex flex-col gap-4 sm:flex-row sm:justify-end">

                            <button type="submit"
                                class="w-full px-8 py-3 font-medium text-white transition-all duration-200 transform shadow-lg sm:w-auto bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl hover:from-yellow-600 hover:to-orange-700 focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 hover:shadow-xl hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed">
                                Update Banner
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script Preview -->
    <script>
        const mediaInput = document.getElementById('mediaInput');
        const previewImage = document.getElementById('previewImage');
        const previewVideo = document.getElementById('previewVideo');
        const bannerType = document.getElementById('bannerType');

        mediaInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (bannerType.value === 'image') {
                previewVideo.classList.add('hidden');
                previewImage.classList.remove('hidden');
                const reader = new FileReader();
                reader.onload = e => previewImage.src = e.target.result;
                reader.readAsDataURL(file);
            } else if (bannerType.value === 'video') {
                previewImage.classList.add('hidden');
                previewVideo.classList.remove('hidden');
                previewVideo.src = URL.createObjectURL(file);
            }
        });
    </script>
@endsection
