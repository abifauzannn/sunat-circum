<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('review.index', compact('reviews'));
    }

    public function create()
    {
        return view('review.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'review_count' => 'required|integer|min:0',
            'icon'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('reviews', 'public');
        }

        Review::create([
            'icon'         => $path,
            'name'         => $request->name,
            'review_count' => $request->review_count,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review berhasil ditambahkan.');
    }

    public function edit(Review $review)
    {
        return view('review.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'review_count' => 'required|integer|min:0',
            'icon'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $review->icon;
        if ($request->hasFile('icon')) {
            if ($review->icon) {
                Storage::disk('public')->delete($review->icon);
            }
            $path = $request->file('icon')->store('reviews', 'public');
        }

        $review->update([
            'icon'         => $path,
            'name'         => $request->name,
            'review_count' => $request->review_count,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review berhasil diperbarui.');
    }

    public function destroy(Review $review)
    {
        if ($review->icon) {
            Storage::disk('public')->delete($review->icon);
        }

        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review berhasil dihapus.');
    }
}
