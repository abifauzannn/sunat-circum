<?php

namespace App\Http\Controllers;

use App\Models\Metode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MetodeController extends Controller
{
    public function index()
    {
        $metodes = Metode::all();
        return view('metodes.index', compact('metodes'));
    }

    public function create()
    {
        return view('metodes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        // cek kalau ada file image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('metodes', 'public');
            $data['image'] = $path;
        }

        Metode::create($data);

        return redirect()->route('metodes.index')->with('success', 'Metode berhasil ditambahkan');
    }

    public function show($id)
    {
        $metode = Metode::findOrFail($id);
        return view('metodes.show', compact('metode'));
    }

    public function edit($id)
    {
        $metode = Metode::findOrFail($id);
        return view('metodes.edit', compact('metode'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $metode = Metode::findOrFail($id);
        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            // hapus image lama kalau ada
            if ($metode->image && Storage::disk('public')->exists($metode->image)) {
                Storage::disk('public')->delete($metode->image);
            }
            $path = $request->file('image')->store('metodes', 'public');
            $data['image'] = $path;
        }

        $metode->update($data);

        return redirect()->route('metodes.index')->with('success', 'Metode berhasil diperbarui');
    }

    public function destroy($id)
    {
        $metode = Metode::findOrFail($id);

        // hapus image kalau ada
        if ($metode->image && Storage::disk('public')->exists($metode->image)) {
            Storage::disk('public')->delete($metode->image);
        }

        $metode->delete();

        return redirect()->route('metodes.index')->with('success', 'Metode berhasil dihapus');
    }
}
