@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Tentang Saya</h2>
        <a href="{{ route('abouts.create') }}"
            class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
            + Tambah Data
        </a>
    </div>

    @if ($abouts->count())
        <div class="bg-white rounded-xl shadow-md p-6">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="p-3">Judul</th>
                        <th class="p-3">Konten</th>
                        <th class="p-3">Gambar</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $about)
                        <tr class="border-b">
                            <td class="p-3 font-semibold">{{ $about->title }}</td>
                            <td class="p-3">{{ Str::limit($about->content, 50) }}</td>
                            <td class="p-3">
                                @if ($about->image)
                                    <img src="{{ asset('storage/' . $about->image) }}" class="h-12 rounded">
                                @else
                                    <span class="text-gray-500">Tidak ada</span>
                                @endif
                            </td>
                            <td class="p-3">
                                <a href="{{ route('abouts.edit', $about) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>

                                <form action="{{ route('abouts.destroy', $about) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                                        onclick="return confirm('Yakin hapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">Belum ada data tentang saya.</p>
    @endif
@endsection
