<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120' // 5MB max
        ]);

        try {
            $file = $request->file('file');
            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
            
            // Store original image
            $path = $file->storeAs('uploads/images', $filename, 'public');
            
            // Create optimized version
            $image = Image::make($file);
            
            // Resize if too large
            if ($image->width() > 1200) {
                $image->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }
            
            // Optimize quality
            $image->encode('jpg', 85);
            
            // Save optimized version
            $optimizedPath = 'uploads/images/optimized/' . $filename;
            Storage::disk('public')->put($optimizedPath, $image->stream());
            
            return response()->json([
                'success' => true,
                'url' => Storage::url($optimizedPath),
                'filename' => $filename
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }
}