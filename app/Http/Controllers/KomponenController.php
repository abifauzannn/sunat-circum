<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use Illuminate\Http\Request;

class KomponenController extends Controller
{
    public function index()
    {
        $komponens = Komponen::all();
        return view('komponens.index', compact('komponens'));
    }

    public function create()
    {
        return view('komponens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        Komponen::create($request->only('nama'));

        return redirect()->route('komponens.index')->with('success', 'Komponen berhasil ditambahkan!');
    }

    public function edit($id)
{
    $komponen = Komponen::findOrFail($id); // pastikan pakai findOrFail
    return view('komponens.edit', compact('komponen'));
}


   public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255'
    ]);

    $komponen = Komponen::findOrFail($id); // ambil manual
    $komponen->update(['nama' => $request->nama]);

    return redirect()->route('komponens.index')->with('success', 'Komponen berhasil diperbarui!');
}


    public function destroy(Komponen $komponen)
    {
        $komponen->delete();

        return redirect()->route('komponens.index')->with('success', 'Komponen berhasil dihapus!');
    }
}

