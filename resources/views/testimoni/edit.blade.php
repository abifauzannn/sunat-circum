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
                                d="M11 5h2m-1 0v14m-7-7h14" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Testimoni</h1>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">Perbarui data testimoni pengguna</p>
                    </div>
                </div>
            </div>

            <!-- Main Form -->
            <div class="mb-8 overflow-hidden bg-white shadow-xl dark:bg-gray-800 rounded-2xl">
                <form action="{{ route('testimoni.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="p-6 space-y-8 sm:p-8">

                        <!-- Name -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="name" value="{{ old('name', $testimoni->name) }}"
                                class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                                required>
                        </div>

                        <!-- Type -->
                        <div class="hidden space-y-2">
                            <label class="text-sm font-semibold text-gray-900 dark:text-white">Jenis Media</label>
                            <select name="type" id="mediaType"
                                class="w-full px-4 py-3 border rounded-xl dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500">
                                <option value="image" {{ $testimoni->type === 'image' ? 'selected' : '' }}>Gambar</option>
                                <option value="video" {{ $testimoni->type === 'video' ? 'selected' : '' }}>Video</option>
                            </select>
                        </div>

                        <!-- Upload -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-900 dark:text-white">Upload Media Baru
                                (opsional)</label>
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
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG, MP4 hingga 20MB
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Preview Lama -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-900 dark:text-white">Preview Media Lama</label>
                            <div class="flex items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                @if ($testimoni->type === 'image')
                                    <img id="previewImage" src="{{ asset('storage/' . $testimoni->media) }}"
                                        class="object-contain rounded-lg shadow-md max-h-32">
                                    <video id="previewVideo" class="hidden rounded-lg shadow-md max-h-40" controls></video>
                                @elseif ($testimoni->type === 'video')
                                    <img id="previewImage" src="https://via.placeholder.com/200x120?text=Preview+Image"
                                        class="hidden object-contain rounded-lg shadow-md max-h-32">
                                    <video id="previewVideo" class="rounded-lg shadow-md max-h-40" controls>
                                        <source src="{{ asset('storage/' . $testimoni->media) }}" type="video/mp4">
                                        Browser tidak mendukung video.
                                    </video>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div
                        class="px-6 py-6 border-t border-gray-200 bg-gray-50 dark:bg-gray-700 sm:px-8 dark:border-gray-600">
                        <div class="flex flex-col gap-4 sm:flex-row sm:justify-end">
                            <button type="submit"
                                class="w-full px-8 py-3 font-medium text-white transition-all duration-200 transform shadow-lg sm:w-auto bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-700 hover:to-indigo-700">
                                Update Testimoni
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script Preview Baru -->
    <script>
        const mediaInput = document.getElementById('mediaInput');
        const previewImage = document.getElementById('previewImage');
        const previewVideo = document.getElementById('previewVideo');
        const mediaType = document.getElementById('mediaType');

        mediaInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (mediaType.value === 'image') {
                previewVideo.classList.add('hidden');
                previewImage.classList.remove('hidden');
                const reader = new FileReader();
                reader.onload = e => previewImage.src = e.target.result;
                reader.readAsDataURL(file);
            } else if (mediaType.value === 'video') {
                previewImage.classList.add('hidden');
                previewVideo.classList.remove('hidden');
                previewVideo.src = URL.createObjectURL(file);
            }
        });
    </script>
@endsection
