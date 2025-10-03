@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Paket & Komponen</h1>
        <a href="{{ route('paket-komponen.create') }}" class="mb-3 btn btn-primary">Tambah</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Paket</th>
                    <th>Komponen</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->paket->nama_paket }}</td>
                        <td>{{ $item->komponen->nama }}</td>
                        <td>{{ $item->detail ?? '-' }}</td>
                        <td>
                            <a href="{{ route('paket-komponen.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('paket-komponen.destroy', $item->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
@endsection
