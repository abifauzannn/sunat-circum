<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket'    => 'required|string|max:255|unique:pakets,nama_paket',
            'price'         => 'required|numeric|min:0',
            'is_bestseller' => 'boolean',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('pakets', 'public');
        }

        Paket::create([
            'nama_paket'    => $request->nama_paket,
            'price'         => $request->price,
            'is_bestseller' => $request->is_bestseller ?? false,
            'image'         => $imagePath,
        ]);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama_paket'    => 'required|string|max:255|unique:pakets,nama_paket,' . $paket->id,
            'price'         => 'required|numeric|min:0',
            'is_bestseller' => 'boolean',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $paket->image;

        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($paket->image && Storage::disk('public')->exists($paket->image)) {
                Storage::disk('public')->delete($paket->image);
            }
            $imagePath = $request->file('image')->store('pakets', 'public');
        }

        $paket->update([
            'nama_paket'    => $request->nama_paket,
            'price'         => $request->price,
            'is_bestseller' => $request->is_bestseller ?? false,
            'image'         => $imagePath,
        ]);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil diupdate!');
    }

    public function destroy(Paket $paket)
    {
        // hapus gambar kalau ada
        if ($paket->image && Storage::disk('public')->exists($paket->image)) {
            Storage::disk('public')->delete($paket->image);
        }

        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus!');
    }
}
