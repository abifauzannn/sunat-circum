<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketKomponen;
use App\Models\Paket;
use App\Models\Komponen;

class PaketKomponenController extends Controller
{
    public function index()
    {
        // Tampilkan semua pivot table dengan relasi
        $items = PaketKomponen::with(['paket', 'komponen'])->get();
        return view('paket-komponen.index', compact('items'));
    }

    public function create()
    {
        $pakets = Paket::all();
        $komponens = Komponen::all();
        return view('paket-komponen.create', compact('pakets', 'komponens'));
    }

    public function store(Request $request)
{
    $request->validate([
        'paket_id' => 'required|exists:pakets,id',
        'komponen_id' => 'required|array',
        'komponen_id.*' => 'exists:komponens_paket,id',
    ]);

    foreach ($request->komponen_id as $komponenId) {
        PaketKomponen::create([
            'paket_id' => $request->paket_id,
            'komponen_id' => $komponenId,
            'detail' => $request->detail
        ]);
    }

    return redirect()->route('paket-komponen.index')->with('success', 'Data berhasil ditambahkan.');
}


    public function edit($id)
    {
        $item = PaketKomponen::findOrFail($id);
        $pakets = Paket::all();
        $komponens = Komponen::all();
        return view('paket-komponen.edit', compact('item', 'pakets', 'komponens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'paket_id' => 'required|exists:pakets,id',
            'komponen_id' => 'required|exists:komponens_paket,id',

        ]);

        $item = PaketKomponen::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('paket-komponen.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = PaketKomponen::findOrFail($id);
        $item->delete();

        return redirect()->route('paket-komponen.index')->with('success', 'Data berhasil dihapus.');
    }
}
