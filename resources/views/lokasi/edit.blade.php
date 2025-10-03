@extends('layouts.app')

@section('content')
    <div class="min-h-screen py-8 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-3xl px-4 mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <div
                class="p-6 mb-8 shadow-sm bg-gradient-to-r from-green-50 to-emerald-100 dark:from-gray-800 dark:to-gray-900 rounded-2xl">
                <div class="flex items-center space-x-4">
                    <div
                        class="flex items-center justify-center w-12 h-12 shadow-lg bg-gradient-to-r from-yellow-500 to-amber-500 rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5h2m-1 0v14m-7-7h14" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Lokasi</h1>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">Ubah detail lokasi cabang yang dipilih</p>
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
                <form action="{{ route('lokasi.update', $lokasi->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nama Cabang -->
                    <div>
                        <label for="nama_cabang"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Nama Cabang</label>
                        <input type="text" id="nama_cabang" name="nama_cabang"
                            value="{{ old('nama_cabang', $lokasi->nama_cabang) }}"
                            class="block w-full px-4 py-2 text-gray-900 border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                            required>
                    </div>

                    <!-- Alamat Cabang -->
                    <div>
                        <label for="alamat_cabang"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Alamat Cabang</label>
                        <textarea id="alamat_cabang" name="alamat_cabang" rows="3"
                            class="block w-full px-4 py-2 text-gray-900 border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:text-white sm:text-sm"
                            required>{{ old('alamat_cabang', $lokasi->alamat_cabang) }}</textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('lokasi.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-500">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2 text-sm font-medium text-white transition-all duration-200 bg-green-500 shadow-lg rounded-xl hover:from-green-700 hover:to-emerald-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Update
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
