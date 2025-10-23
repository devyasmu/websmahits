<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * Upload and process image
     */
    public static function upload(UploadedFile $file, string $directory = 'images', array $sizes = [])
    {
        // Generate unique filename
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Store original file
        $path = $file->storeAs($directory, $filename, 'public');
        
        // Process different sizes if provided
        $processedImages = ['original' => $path];
        
        if (!empty($sizes)) {
            foreach ($sizes as $sizeName => $size) {
                $processedImages[$sizeName] = self::resize($path, $size, $directory);
            }
        }
        
        return $processedImages;
    }
    
    /**
     * Resize image to specified dimensions
     */
    public static function resize(string $imagePath, array $size, string $directory = 'images')
    {
        $fullPath = storage_path('app/public/' . $imagePath);
        
        if (!file_exists($fullPath)) {
            return null;
        }
        
        $width = $size['width'] ?? null;
        $height = $size['height'] ?? null;
        $quality = $size['quality'] ?? 90;
        
        $image = Image::make($fullPath);
        
        // Resize with aspect ratio
        if ($width && $height) {
            $image->fit($width, $height);
        } elseif ($width) {
            $image->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        } elseif ($height) {
            $image->resize(null, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        
        // Generate thumbnail filename
        $pathInfo = pathinfo($imagePath);
        $thumbnailFilename = $pathInfo['filename'] . '_' . ($width ?? 'auto') . 'x' . ($height ?? 'auto') . '.' . $pathInfo['extension'];
        $thumbnailPath = $directory . '/' . $thumbnailFilename;
        
        // Save thumbnail
        $image->save(storage_path('app/public/' . $thumbnailPath), $quality);
        
        return $thumbnailPath;
    }
    
    /**
     * Delete image and its thumbnails
     */
    public static function delete(string $imagePath, array $thumbnails = [])
    {
        // Delete original
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        
        // Delete thumbnails
        foreach ($thumbnails as $thumbnail) {
            if (Storage::disk('public')->exists($thumbnail)) {
                Storage::disk('public')->delete($thumbnail);
            }
        }
    }
    
    /**
     * Get image URL
     */
    public static function url(string $path)
    {
        return Storage::disk('public')->url($path);
    }
    
    /**
     * Get common image sizes for different use cases
     */
    public static function getCommonSizes()
    {
        return [
            'thumbnail' => ['width' => 300, 'height' => 200, 'quality' => 80],
            'medium' => ['width' => 600, 'height' => 400, 'quality' => 85],
            'large' => ['width' => 1200, 'height' => 800, 'quality' => 90],
            'slider' => ['width' => 1920, 'height' => 1080, 'quality' => 90],
            'gallery' => ['width' => 800, 'height' => 600, 'quality' => 85],
            'avatar' => ['width' => 150, 'height' => 150, 'quality' => 90],
        ];
    }
    
    /**
     * Upload with predefined sizes
     */
    public static function uploadWithSizes(UploadedFile $file, string $directory = 'images', string $sizeType = 'medium')
    {
        $sizes = self::getCommonSizes();
        
        if (!isset($sizes[$sizeType])) {
            $sizeType = 'medium';
        }
        
        return self::upload($file, $directory, [$sizeType => $sizes[$sizeType]]);
    }
    
    /**
     * Upload multiple images
     */
    public static function uploadMultiple(array $files, string $directory = 'images', array $sizes = [])
    {
        $results = [];
        
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $results[] = self::upload($file, $directory, $sizes);
            }
        }
        
        return $results;
    }
    
    /**
     * Validate image file
     */
    public static function validate(UploadedFile $file, int $maxSize = 5120) // 5MB default
    {
        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $maxSizeKB = $maxSize; // KB
        
        if (!in_array($file->getMimeType(), $allowedMimes)) {
            return ['valid' => false, 'message' => 'Format file tidak didukung. Gunakan JPG, PNG, GIF, atau WebP.'];
        }
        
        if ($file->getSize() > $maxSizeKB * 1024) {
            return ['valid' => false, 'message' => "Ukuran file terlalu besar. Maksimal {$maxSizeKB}KB."];
        }
        
        return ['valid' => true, 'message' => 'File valid.'];
    }
}
