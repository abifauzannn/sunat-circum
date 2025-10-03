<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function edit()
    {
        $banner = Banner::first(); // hanya 1 data
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'type'  => 'required|in:image,video',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480',
            'link'  => 'nullable|string|max:255',
        ]);

        $banner = Banner::first(); // ambil data pertama
        if (!$banner) {
            $banner = new Banner();
        }

        $banner->title = $request->title;
        $banner->type  = $request->type;
        $banner->link  = $request->link;

        if ($request->hasFile('media')) {
            if ($banner->media && Storage::disk('public')->exists($banner->media)) {
                Storage::disk('public')->delete($banner->media);
            }
            $banner->media = $request->file('media')->store('banners', 'public');
        }

        $banner->save();

        return redirect()->route('banner.edit')->with('success', 'Banner berhasil diperbarui.');
    }
}
