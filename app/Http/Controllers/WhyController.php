<?php

namespace App\Http\Controllers;

use App\Models\Why;
use Illuminate\Http\Request;

class WhyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
    {
        $why = Why::all();
        return view('why.index', compact('why'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('why.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Why::create([
            'name' => $request->name
        ]);

        return redirect()->route('why.index')->with('success', 'Data berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $why = Why::findOrFail($id);
        return view('why.edit', compact('why'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $why = Why::findOrFail($id);
        $why->update([
            'name' => $request->name
        ]);

        return redirect()->route('why.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $why = Why::findOrFail($id);
        $why->delete();

        return redirect()->route('why.index')->with('success', 'why berhasil dihapus!');
    }
}
