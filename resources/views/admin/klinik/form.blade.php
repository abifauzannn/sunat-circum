@extends('layouts.app')

@section('content')
    <!-- Full background wrapper -->
    <div class="min-h-screen py-8 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
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
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Pengaturan Klinik</h1>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">Kelola informasi dan pengaturan klinik Anda</p>
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
                <form action="{{ route('klinik.save') }}" method="POST" enctype="multipart/form-data" class="space-y-0">
                    @csrf

                    <!-- Form Content -->
                    <div class="p-6 space-y-8 sm:p-8">
                        <!-- Clinic Name Section -->
                        <div class="space-y-2">
                            <label class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 text-blue-600 me-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                                Nama Klinik
                            </label>
                            <input type="text" name="title" value="{{ old('title', $klinik->title ?? '') }}"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 hover:border-blue-300 @error('title') border-red-500 focus:ring-red-500 @enderror"
                                placeholder="Masukkan nama klinik..." required>
                            @error('title')
                                <p class="flex items-center mt-1 text-sm text-red-500">
                                    <svg class="w-4 h-4 me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Logo Section -->
                        <div class="space-y-4">
                            <label class="flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 text-blue-600 me-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Logo / Gambar Klinik
                            </label>

                            <!-- File Input with Custom Styling -->
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

                            <!-- Image Preview -->
                            <div class="relative">
                                <div class="flex items-center justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                    <img id="previewImage"
                                        src="{{ !empty($klinik->image) ? asset('storage/' . $klinik->image) : 'https://via.placeholder.com/200x120?text=Preview+Logo' }}"
                                        alt="Preview Logo"
                                        class="object-contain transition-all duration-300 rounded-lg shadow-md max-h-32 hover:scale-105">
                                </div>
                                <div id="imageInfo"
                                    class="hidden mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                                    <span id="fileName"></span> - <span id="fileSize"></span>
                                </div>
                            </div>

                            @error('image')
                                <p class="flex items-center text-sm text-red-500">
                                    <svg class="w-4 h-4 me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Description Section -->
                        <div class="space-y-2">
                            <label class="flex items-center mb-3 text-sm font-semibold text-gray-900 dark:text-white">
                                <svg class="w-4 h-4 text-blue-600 me-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Deskripsi Klinik
                            </label>
                            <textarea name="description" rows="5"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 hover:border-blue-300 resize-none @error('description') border-red-500 focus:ring-red-500 @enderror"
                                placeholder="Ceritakan tentang klinik Anda, layanan yang tersedia, jam operasional, dll..." maxlength="1000">{{ old('description', $klinik->description ?? '') }}</textarea>

                            <div class="flex items-center justify-between text-sm">
                                @error('description')
                                    <p class="flex items-center text-red-500">
                                        <svg class="w-4 h-4 me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @else
                                    <span class="text-gray-500 dark:text-gray-400">Ceritakan tentang klinik Anda</span>
                                @enderror
                                <span id="charCount" class="text-gray-400">0/1000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div
                        class="px-6 py-6 border-t border-gray-200 bg-gray-50 dark:bg-gray-700 sm:px-8 dark:border-gray-600">
                        <div class="flex flex-col gap-4 sm:flex-row sm:justify-end">
                            <button type="button" onclick="window.history.back()"
                                class="w-full px-6 py-3 font-medium text-gray-700 transition-all duration-200 border border-gray-300 sm:w-auto dark:border-gray-600 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                <span class="flex items-center justify-center">
                                    <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Batal
                                </span>
                            </button>

                            <button type="submit"
                                class="w-full px-8 py-3 font-medium text-white transition-all duration-200 transform shadow-lg sm:w-auto bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-700 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:shadow-xl hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed">
                                <span class="flex items-center justify-center">
                                    <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Simpan Pengaturan
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Additional Info Card -->
            {{-- <div
                class="p-6 mb-8 border bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border-amber-200 dark:border-gray-700">
                <div class="flex items-start space-x-3">
                    <svg class="h-5 w-5 text-amber-600 dark:text-amber-400 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="mb-2 text-sm font-semibold text-amber-900 dark:text-amber-100">Tips Pengaturan Klinik
                        </h3>
                        <ul class="space-y-1 text-sm text-amber-800 dark:text-amber-200">
                            <li>• Gunakan logo dengan format PNG atau JPG untuk hasil terbaik</li>
                            <li>• Ukuran logo yang disarankan: 200x200 piksel atau lebih</li>
                            <li>• Deskripsi yang informatif akan membantu pasien mengenal klinik Anda</li>
                            <li>• Pastikan informasi yang dimasukkan akurat dan terkini</li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <!-- Enhanced JavaScript -->
    <script>
        // Character counter
        const textarea = document.querySelector('textarea[name="description"]');
        const charCount = document.getElementById('charCount');

        function updateCharCount() {
            const count = textarea.value.length;
            charCount.textContent = `${count}/1000`;

            if (count > 800) {
                charCount.classList.add('text-red-500');
                charCount.classList.remove('text-gray-400');
            } else {
                charCount.classList.add('text-gray-400');
                charCount.classList.remove('text-red-500');
            }
        }

        textarea.addEventListener('input', updateCharCount);
        updateCharCount(); // Initialize count

        // Enhanced image preview
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage');
            const imageInfo = document.getElementById('imageInfo');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');

            if (file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('Please select a valid image file.');
                    this.value = '';
                    return;
                }

                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.add('border-2', 'border-blue-200');
                }
                reader.readAsDataURL(file);

                // Show file info
                fileName.textContent = file.name;
                fileSize.textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';
                imageInfo.classList.remove('hidden');
            } else {
                // Reset to placeholder
                preview.src = 'https://via.placeholder.com/200x120?text=Preview+Logo';
                preview.classList.remove('border-2', 'border-blue-200');
                imageInfo.classList.add('hidden');
            }
        });

        // Form validation
        const form = document.querySelector('form');
        const submitButton = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', function(e) {
            // Disable submit button to prevent double submission
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <span class="flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menyimpan...
                </span>
            `;
        });

        // Auto-save draft (optional - you can implement this with localStorage)
        let autoSaveTimeout;
        const formInputs = form.querySelectorAll('input, textarea');

        formInputs.forEach(input => {
            input.addEventListener('input', function() {
                clearTimeout(autoSaveTimeout);
                autoSaveTimeout = setTimeout(() => {
                    // Here you could implement auto-save to localStorage
                    console.log('Auto-saving draft...');
                }, 2000);
            });
        });

        // Smooth transitions
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.animate-fade-in');
            elements.forEach(el => {
                el.style.animation = 'fadeIn 0.5s ease-in-out';
            });
        });
    </script>

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

        /* Ensure consistent gray background */
        body {
            background-color: #f3f4f6 !important;
        }

        .dark body {
            background-color: #111827 !important;
        }

        /* Custom scrollbar for textarea */
        textarea::-webkit-scrollbar {
            width: 6px;
        }

        textarea::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 6px;
        }

        textarea::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 6px;
        }

        textarea::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Dark mode scrollbar */
        .dark textarea::-webkit-scrollbar-track {
            background: #374151;
        }

        .dark textarea::-webkit-scrollbar-thumb {
            background: #6b7280;
        }

        .dark textarea::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
    </style>
@endsection
