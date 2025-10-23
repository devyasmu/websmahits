<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Category;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Display a listing of downloads.
     */
    public function index(Request $request)
    {
        $query = Download::with('category')->active();

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $downloads = $query->latest()->paginate(12);
        $categories = Category::active()->get();

        return view('downloads.index', compact('downloads', 'categories'));
    }

    /**
     * Download a file.
     */
    public function download($id)
    {
        $download = Download::active()->findOrFail($id);
        
        // Increment download count
        $download->increment('download_count');
        
        $filePath = storage_path('app/public/' . $download->file_path);
        
        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }
        
        return response()->download($filePath, $download->file_name);
    }
}
