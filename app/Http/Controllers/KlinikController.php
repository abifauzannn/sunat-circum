<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use Illuminate\Http\Request;

class KlinikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Klinik $klinik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Klinik $klinik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Klinik $klinik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klinik $klinik)
    {
        //
    }

    public function form()
{
    $klinik = Klinik::first();
    return view('admin.klinik.form', compact('klinik'));
}

public function save(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $klinik = Klinik::first() ?? new Klinik();
    $klinik->title = $request->title;
    $klinik->description = $request->description;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $klinik->image = $path;
    }

    $klinik->save();

    return redirect()->route('klinik.form')->with('success', 'Data klinik berhasil disimpan!');
}


}
