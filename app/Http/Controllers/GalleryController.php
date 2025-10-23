<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of galleries.
     */
    public function index(Request $request)
    {
        $query = Gallery::with('category')->active();

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by type
        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        $galleries = $query->ordered()->paginate(12);
        $categories = Category::active()->get();

        return view('galleries.index', compact('galleries', 'categories'));
    }

    /**
     * Display the specified gallery.
     */
    public function show($slug)
    {
        $gallery = Gallery::with('category')
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        // Get related galleries
        $related_galleries = Gallery::active()
            ->where('category_id', $gallery->category_id)
            ->where('id', '!=', $gallery->id)
            ->ordered()
            ->limit(6)
            ->get();

        return view('galleries.show', compact('gallery', 'related_galleries'));
    }
}
