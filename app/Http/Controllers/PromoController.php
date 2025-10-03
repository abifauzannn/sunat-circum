<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    public function edit()
    {
        $promo = Promo::first(); // hanya 1 data
        return view('promos.edit', compact('promo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:20480',
        ]);

        $promo = Promo::first(); // ambil data pertama
        if (!$promo) {
            $promo = new Promo();
        }

        $promo->name = $request->name;

        if ($request->hasFile('image')) {
            if ($promo->image && Storage::disk('public')->exists($promo->image)) {
                Storage::disk('public')->delete($promo->image);
            }
            $promo->image = $request->file('image')->store('promos', 'public');
        }

        $promo->save();

        return redirect()->route('promo.edit')->with('success', 'Promo berhasil diperbarui.');
    }
}
