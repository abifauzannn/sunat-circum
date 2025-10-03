@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Paket-Komponen</h1>
        <form action="{{ route('paket-komponen.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Paket</label>
                <select name="paket_id" class="form-control" required>
                    <option value="">Pilih Paket</option>
                    @foreach ($pakets as $paket)
                        <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Komponen</label>
                <select id="komponenSelect" class="form-control">
                    <option value="">Pilih Komponen</option>
                    @foreach ($komponens as $komponen)
                        <option value="{{ $komponen->id }}">{{ $komponen->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tempat menampilkan komponen terpilih --}}
            <div id="selectedKomponenList" class="mb-3"></div>

            <div class="mb-3">
                <label>Detail</label>
                <input type="text" name="detail" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
        const select = document.getElementById('komponenSelect');
        const container = document.getElementById('selectedKomponenList');

        select.addEventListener('change', function() {
            const komponenId = this.value;
            const komponenText = this.options[this.selectedIndex].text;

            if (komponenId && !document.getElementById('komponen-' + komponenId)) {
                // buat wrapper item
                const div = document.createElement('div');
                div.id = 'komponen-' + komponenId;
                div.className = 'd-flex align-items-center mb-2';

                // hidden input supaya terkirim ke backend
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'komponen_id[]';
                input.value = komponenId;

                // label teks
                const span = document.createElement('span');
                span.textContent = komponenText;
                span.className = 'me-2';

                // tombol hapus
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = 'X';
                btn.className = 'btn btn-sm btn-danger';
                btn.onclick = () => div.remove();

                div.appendChild(input);
                div.appendChild(span);
                div.appendChild(btn);

                container.appendChild(div);
            }

            // reset select
            this.value = "";
        });
    </script>
@endsection
