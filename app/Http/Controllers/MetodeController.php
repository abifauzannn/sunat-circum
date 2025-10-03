<?php

namespace App\Http\Controllers;

use App\Models\Metode;
use Illuminate\Http\Request;

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
            'name' => 'required|string|max:255',
            'description' => 'required'
        ]);

        Metode::create($request->all());

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
            'name' => 'required|string|max:255',
            'description' => 'required'
        ]);

        $metode = Metode::findOrFail($id);
        $metode->update($request->all());

        return redirect()->route('metodes.index')->with('success', 'Metode berhasil diperbarui');
    }

    public function destroy($id)
    {
        $metode = Metode::findOrFail($id);
        $metode->delete();

        return redirect()->route('metodes.index')->with('success', 'Metode berhasil dihapus');
    }
}
