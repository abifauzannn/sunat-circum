<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function edit()
    {
        $testimoni = Testimoni::first(); // hanya 1 data
        return view('testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'type'  => 'required|in:image,video',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480',
        ]);

        $testimoni = Testimoni::first();
        if (!$testimoni) {
            $testimoni = new Testimoni();
        }

        $testimoni->name = $request->name;
        $testimoni->type = $request->type;

        if ($request->hasFile('media')) {
            if ($testimoni->media && Storage::disk('public')->exists($testimoni->media)) {
                Storage::disk('public')->delete($testimoni->media);
            }
            $testimoni->media = $request->file('media')->store('testimoni', 'public');
        }

        $testimoni->save();

        return redirect()->route('testimoni.edit')->with('success', 'Testimoni berhasil diperbarui.');
    }
}
