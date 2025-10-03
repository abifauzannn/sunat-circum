@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Tambah Tentang Saya</h2>

    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-xl shadow-md max-w-2xl">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-semibold mb-2">Judul</label>
            <input type="text" name="title" id="title" class="w-full border rounded-lg p-2"
                value="{{ old('title') }}">
        </div>

        <div class="mb-4">
            <label for="content" class="block font-semibold mb-2">Konten</label>
            <textarea name="content" id="content" rows="4" class="w-full border rounded-lg p-2">{{ old('content') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block font-semibold mb-2">Gambar</label>
            <input type="file" name="image" id="image" class="w-full">
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
            Simpan
        </button>
    </form>
@endsection
