@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Paket-Komponen</h1>
        <form action="{{ route('paket-komponen.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Paket</label>
                <select name="paket_id" class="form-control" required>
                    @foreach ($pakets as $paket)
                        <option value="{{ $paket->id }}" @if ($item->paket_id == $paket->id) selected @endif>
                            {{ $paket->nama_paket }}</option>
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

            {{-- daftar komponen yang sudah dipilih --}}
            <div id="selectedKomponenList" class="mb-3">
                @foreach ($item->komponens as $komponen)
                    <div id="komponen-{{ $komponen->id }}" class="mb-2 d-flex align-items-center">
                        <input type="hidden" name="komponen_id[]" value="{{ $komponen->id }}">
                        <span class="me-2">{{ $komponen->nama }}</span>
                        <button type="button" class="btn btn-sm btn-danger"
                            onclick="this.parentElement.remove()">X</button>
                    </div>
                @endforeach
            </div>

            <script>
                const select = document.getElementById('komponenSelect');
                const container = document.getElementById('selectedKomponenList');

                select.addEventListener('change', function() {
                    const komponenId = this.value;
                    const komponenText = this.options[this.selectedIndex].text;

                    if (komponenId && !document.getElementById('komponen-' + komponenId)) {
                        const div = document.createElement('div');
                        div.id = 'komponen-' + komponenId;
                        div.className = 'd-flex align-items-center mb-2';

                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'komponen_id[]';
                        input.value = komponenId;

                        const span = document.createElement('span');
                        span.textContent = komponenText;
                        span.className = 'me-2';

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

                    this.value = "";
                });
            </script>




            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
