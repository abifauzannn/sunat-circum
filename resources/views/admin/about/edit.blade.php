@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Edit Tentang Saya</h2>

    <form action="{{ route('abouts.update', $about) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-xl shadow-md max-w-2xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block font-semibold mb-2">Judul</label>
            <input type="text" name="title" id="title" class="w-full border rounded-lg p-2"
                value="{{ old('title', $about->title) }}">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold mb-2">Konten</label>
            <textarea name="description" id="description" rows="4" class="w-full border rounded-lg p-2">{{ old('description', $about->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block font-semibold mb-2">Gambar</label>
            @if ($about->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $about->image) }}" alt="Current Image" class="h-24 rounded">
                </div>
            @endif
            <input type="file" name="image" id="image" class="w-full">
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
            Update
        </button>
    </form>
@endsection
