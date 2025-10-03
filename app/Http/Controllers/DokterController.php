<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
   public function index()
    {
        $dokter = Dokter::all();
        return view('dokters.index', compact('dokter'));
    }

    public function create()
    {
        return view('dokters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'sip'      => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('dokter', 'public');
        }

        Dokter::create([
            'nama_dokter' => $request->nama_dokter,
            'sip'      => $request->sip,
            'image'          => $path,
        ]);

        return redirect()->route('dokters.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit(Dokter $dokter)
    {
        return view('dokters.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'sip'      => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $dokter->image;
        if ($request->hasFile('image')) {
            if ($dokter->image) {
                Storage::disk('public')->delete($dokter->image);
            }
            $path = $request->file('image')->store('dokter', 'public');
        }

        $dokter->update([
            'nama_dokter' => $request->nama_dokter,
            'sip'      => $request->sip,
            'image'          => $path,
        ]);

        return redirect()->route('dokters.index')->with('success', 'Dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        if ($dokter->image) {
            Storage::disk('public')->delete($dokter->image);
        }

        $dokter->delete();

        return redirect()->route('dokters.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
